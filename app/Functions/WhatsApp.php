<?php

namespace App\Functions;

use Modules\Order\Entities\Model as Order;

class WhatsApp
{
    public static function SendOTP($phone)
    {
        $otp = rand(100000, 999999);

        $body = '';
        $body .= '\n *('.env('APP_NAME').')* \n';
        $body .= '\n *Your Verification Code Is* '.$otp.' \n';
        $body .= '\n Powered By *Emcan Solutions*';

        self::SendWhatsApp($phone, $body);

        return $otp;
    }

    // public static function SendOrder($id)
    // {
    //     $Order = Order::with('Branch', 'Client.Country', 'Devices', 'Address')->find($id);

    //     $message = '\n *'.__('trans.newOrders').' ('.env('APP_NAME').')* \n';
    //     $message .= '\n *Order Number :* '.$Order->id;

    //     if ($Order->Branch) {
    //         $message .= '\n *'.__('trans.branch').' :* '.$Order->Branch->title();
    //     }

    //     $message .= '\n *'.__('trans.name').' :* '.$Order->Client->name;
    //     $message .= '\n *'.__('trans.phone').' :* '.$Order->Client->phone;
    //     $message .= '\n *'.__('trans.time').' :* '.$Order->created_at;

    //     if ($Order->delivery_id == 1) {
    //         $message .= '\n *'.__('trans.region').' :* '.$Order->Address->region->title();
    //         if ($Order->Address->road) {
    //             $message .= '\n *'.__('trans.block').' :* '.$Order->Address->block;
    //         }
    //         if ($Order->Address->building_no) {
    //             $message .= '\n *'.__('trans.road').' :* '.$Order->Address->road;
    //         }
    //         if ($Order->Address->floor_no) {
    //             $message .= '\n *'.__('trans.building').' :* '.$Order->Address->building_no;
    //         }
    //         if ($Order->Address->apartment) {
    //             $message .= '\n *'.__('trans.floor').' :* '.$Order->Address->floor_no;
    //         }
    //         if ($Order->Address->type) {
    //             $message .= '\n *'.__('trans.apartment').' :* '.$Order->Address->apartment;
    //         }
    //         if ($Order->Address->additional_directions) {
    //             $message .= '\n *'.__('trans.type').' :* '.$Order->Address->type;
    //         }
    //         $message .= '\n *'.__('trans.additional_directions').' :* '.$Order->Address->additional_directions.' \n';
    //     } elseif ($Order->delivery_id == 2) {
    //         $message .= '\n *'.__('trans.type').' :* '.__('trans.Pickup').' \n';
    //     }

    //     $message .= '\n *'.__('trans.items').' :* ';
    //     foreach ($Order->Devices as $Device) {
    //         $message .= '\n *'.__('trans.item').' :* '.strip_tags($Device->title());
    //         if ($Device->pivot->color_id) {
    //             $Color = Color($Device->pivot->color_id);
    //             $message .= '\n *'.__('trans.color').' :* '.$Color->title();
    //         }
    //         if ($Device->pivot->price) {
    //             $message .= '\n *'.__('trans.price').' :* '.$Device->pivot->price;
    //         }
    //         if ($Device->pivot->quantity) {
    //             $message .= '\n *'.__('trans.quantity').' :* '.$Device->pivot->quantity.'\n';
    //         }
    //     }
    //     $message .= '\n *'.__('trans.subTotal').' :* '.$Order->sub_total.' '.Country()->currancy_code;
    //     if ($Order->discount > 0) {
    //         $message .= '\n *'.__('trans.discount').' :* '.$Order->discount.' '.Country()->currancy_code;
    //     }
    //     if ($Order->vat > 0) {
    //         $message .= '\n *'.__('trans.vat').' :* '.$Order->vat.' '.Country()->currancy_code;
    //     }
    //     if ($Order->coupon > 0) {
    //         $message .= '\n *'.__('trans.coupon').' :* '.$Order->coupon.' '.Country()->currancy_code;
    //     }
    //     if ($Order->charge_cost > 0) {
    //         $message .= '\n *'.__('trans.delivery_charge').' :* '.$Order->charge_cost.' '.Country()->currancy_code;
    //     }
    //     $message .= '\n *'.__('trans.netTotal').' :* '.$Order->net_total.' '.Country()->currancy_code;

    //     $message .= '\n *Powered By Emcan Solutions* \n';

    //     WhatsApp::SendWhatsApp($Order->Client->Country->phone_code.$Order->Client->phone, $message);
    //     if (Setting('whatsapp')) {
    //         WhatsApp::SendWhatsApp(Setting('whatsapp'), $message);
    //     }
    // }
    public static function SendOrder($Order)
    {
        $message = '\n *An Order Has Been Placed By '.' ('.env('APP_NAME').')* \n';
        $message .= '\n *Order Number :* '.$Order->id;
        if ($Order->status == 5) {
            $message .= '\n *'.__('trans.not_complete').'* ';
        }

        $message .= '\n *Payment :* '.$Order->Payment?->title_en;

        $message .= '\n *Client Name :* '.$Order->client->first_name.' '.$Order->client->last_name;
        $message .= '\n *Client Number :* '.$Order->client->phone;
        $message .= '\n *Order Time :* '.$Order->created_at.' \n';

        if ($Order->delivery_id == 1) {
            $message .= '\n *Country :* '.$Order->address->country->title_en.' \n';
            $message .= '\n *Region :* '.$Order->address->region->title_en.' \n';
            $message .= '\n *District :* '.$Order->address->block.' \n';
            $message .= '\n *Road :* '.$Order->address->road.' \n';
            $message .= '\n *Building Number :* '.$Order->address->apartment.' \n';
            if($Order->address->flat != null){
                $message .= '\n *Flat :* '.$Order->address->flat.' \n';
            }
            if($Order->address->floor_no != null){
                $message .= '\n *Floor Number :* '.$Order->address->floor_no.' \n';
            }
            if($Order->address->note != null){
                $message .= '\n *Note :* '.$Order->address->note.' \n';
            }
        } elseif ($Order->delivery_id == 2) {
            $message .= '\n *Type :* '.'Pick Up'.' \n';
        }

        $message .= '\n *Products :* \n';
        // dd($Order->OrderProducts);
        foreach ($Order->OrderProducts as $item) {
            $message .= '\n *Item :* '.strip_tags($item->Product->title_en);
            if ($item->Size->parent_id) {
                $message .= '\n *Size :* '.$item->Size->title;
            }
            if ($item->Color) {
                $message .= '\n *Color :* '.$item->Color->title_en;
            }
            $message .= '\n *Price :* '.number_format( $item->price, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
            if ($item->note) {
                $message .= '\n *Note :* '.$item->note.'\n';
            }
            $message .= '\n *Quantity :* '.$item->quantity.'\n';
        }
        $message .= '\n';
        $message .= '\n *SubTotal :* '.number_format( $Order->sub_total, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        if ($Order->discount > 0) {
            $message .= '\n *Discount :* '.number_format( $Order->discount, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        }
        
        if ($Order->coupon > 0) {
            $message .= '\n *Coupon :* '.number_format( $Order->coupon, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
            $message .= '\n *Sub Total after coupon :* '.number_format( $Order->sub_total_after_coupon, Country()->decimals, '.', '').' '.Country()->currancy_code_en;

        }
        if ($Order->vat > 0) {
            $message .= '\n *VAT :* '.number_format( $Order->vat, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        }
        if ($Order->charge_cost > 0) {
            $message .= '\n *Delivery Cost :* '.number_format( $Order->charge_cost, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        }
        $message .= '\n *NetTotal :* '.number_format( $Order->net_total, Country()->decimals, '.', '').' '.Country()->currancy_code_en;
        if ($Order->notes != null) {
            $message .= '\n *Order Notes :* '.$Order->notes;
        }
        $message .= '\n  \n';

        $message .= '\n '.setting('order_whatsapp_text_'.lang());
        $message .= '\n *Powered By Emcan Solutions* \n';

        self::SendWhatsApp($Order->client->phone_code.$Order->client->phone, $message);
        // self::SendWhatsApp(Setting('whatsapp'), $message);
    }

    public static function GetToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://emcan.bh/api/UltraCredentials',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS => 'token=zuvzajw7goMh20q5YVu0&domain='.$_SERVER['SERVER_NAME'],
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => [
                'content-type: application/x-www-form-urlencoded',
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return json_decode($response);
    }

    public static function SendWhatsApp($numbers, $message)
    {
        $EmcanWhats = self::GetToken();
        $instance = $EmcanWhats->instance;
        $token = $EmcanWhats->token;
        if ($EmcanWhats->active) {
            $numbers = is_array($numbers) ? $numbers : [$numbers];
            foreach ($numbers as $number) {
                $number = str_replace('++', '+', $number);
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => 'https://api.ultramsg.com/'.$instance.'/messages/chat',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => "token=$token&to=$number&body=$message&priority=1&referenceId=",
                    CURLOPT_HTTPHEADER => [
                        'content-type: application/x-www-form-urlencoded',
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
            }
        }
    }
}
