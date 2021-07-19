<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Chat;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Kavenegar;


class AdvertisingController extends Controller
{
    public function get_advertisements()
    {
        $advertisement = Advertisement::where('status', true)->get();
        $advertisements = $advertisement->load(['tags']);
        return view('advertisements', ['advertisements' => $advertisements]);
    }
    public function get_advertisement($id)
    {
        $advertisement = Advertisement::find($id);
        $advertiser = $advertisement->user;
        $tags = $advertisement->tags;
        $chats = app('App\Http\Controllers\MessageController')->getChat($advertisement);
        if ($chats->isEmpty() && Auth::user()->id != $advertiser->id) {
            $newChat = Chat::create(['buyer' => Auth::user()->id, 'advertiser' => $advertiser->id, 'advertisement_id' => $advertisement->id]);
            $newChat = $newChat->load(['user']);
            return view('advertisement_info', ['advertisement' => $advertisement, 'tags' => $tags, 'chats' => collect([$newChat])]);
        } else {
            $chats = $chats->load(['user']);
            return view('advertisement_info', ['advertisement' => $advertisement, 'tags' => $tags, 'chats' => $chats]);
        }
    }
    public function get_index_advertisements()
    {
        $newAdvertisements = Advertisement::where('status', true)->orderBy('created_at')->take(4)->get()->load('tags');
        $chosen_advertisements = Advertisement::where([['chosen', true], ['status', true]])->get()->load('tags');
        return view('index', ['chosen_advertisements' => $chosen_advertisements, 'newAdvertisements' => $newAdvertisements]);
    }
    public function add_advertisement(Request $request)
    {
        $DownloadLink = $request->file('DownloadLink')->store('public/advertisements/downloads');
        $ImageLink = $request->file('ImageLink')->store('public/advertisements/images');
        $PreviewLink = $request->file('PreviewLink')->store('public/advertisements/previews');
        $DownloadLink = '/storage' . substr($DownloadLink, 6);
        $ImageLink = '/storage' . substr($ImageLink, 6);
        $PreviewLink = '/storage' . substr($PreviewLink, 6);
        $advertisement = Advertisement::create(['name' => $request->name, 'price' => $request->price, 'dl_link' => $DownloadLink, 'prev_link' => $PreviewLink, 'img_link' => $ImageLink, 'user_id' => Auth::user()->id]);
        $advertisement->tags()->sync($request->tags);

        return back()
            ->with('success', 'آگهی با موفقیت ایجاد شد');
    }
    public function edit_advertisement(Request $request)
    {

        if ($request->chosen == null && $request->status != null) {
            Advertisement::find($request->id)->update(['status' => true], ['chosen' => false]);
        } else if ($request->status == null && $request->chosen != null) {
            Advertisement::find($request->id)->update(['status' => false], ['chosen' => true]);
        } else if ($request->status != null && $request->chosen != null) {
            Advertisement::find($request->id)->update(['chosen' => true, 'status' => true]);
        } else if ($request->status == null && $request->chosen == null)
            Advertisement::find($request->id)->update(['chosen' => true, 'status' => true]);
        return back();
    }
    public function purchase_advertisement(Advertisement $advertisement)
    {
        if (Auth::user()->id != $advertisement->user->id) {
            if (Auth::user()->credit >= $advertisement->price) {
                $issue_tracking = Carbon::now()->getPreciseTimestamp(3);
                $newCredit = Auth::user()->credit - $advertisement->price;

                User::where('id', Auth::user()->id)->update(['credit' => $newCredit]);

                Purchase::create(['user_id' => Auth::user()->id, 'advertisement_id' => $advertisement->id, 'issue_tracking' =>  $issue_tracking]);

                Advertisement::where('id', $advertisement->id)->update(['status' => false]);

                try {
                    $sender = "1000596446";        //This is the Sender number 

                    $message = "آگهی {$advertisement->name} شما خریداری شد.\n\nسایت فروشگاه اینترنتی کتاب";        //The body of SMS

                    $receptor = "{$advertisement->user->phoneNumber}";            //Receptors numbers

                    $result = Kavenegar::Send($sender, $receptor, $message);
                    if ($result) {
                        foreach ($result as $r) {
                            echo "messageid = $r->messageid";
                            echo "message = $r->message";
                            echo "status = $r->status";
                            echo "statustext = $r->statustext";
                            echo "sender = $r->sender";
                            echo "receptor = $r->receptor";
                            echo "date = $r->date";
                            echo "cost = $r->cost";
                        }
                    }
                } catch (\Kavenegar\Exceptions\ApiException $e) {
                    // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                    echo $e->errorMessage();
                } catch (\Kavenegar\Exceptions\HttpException $e) {
                    // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                    echo $e->errorMessage();
                }

                return redirect('panel#cart')->with('purchaseSuccess', 'خرید شما با موفقیت انجام شد \nکد رهگیری : ' . $issue_tracking);
            } else
                return back()
                    ->with('failed', 'میزان اعتبار شما کمتر از قیمت آگهی است.');
        } else {
            return back()
                ->with('failed', 'امکان خرید برای شما در این آگهی وجود ندارد.');
        }
    }
    public function search_advertisement(Request $request)
    {
        $searchedAdvertisements = Tag::where('name', $request->search)->get()->load('advertisements');
        return view('searchedAdvertisements', ['searchedAdvertisements' => $searchedAdvertisements]);
    }
}
