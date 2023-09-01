<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    //
    public function index()
    {
        return view('sendsms');
    }
    public function sendSMS(Request $request)
    {
        $template = $request->input('template');
        $mobiles = $request->input('mobiles');
        $authKey = 'MSG91 authkey';

        // Define custom headers
        $customHeaders = [
            'accept' => 'application/json',
            'authkey' => $authKey,
            'content-type' => 'application/json',
        ];

        // Prepare the request payload
        $payload = [
            'template_id' => $template,
            'short_url' => 1, // 1 (On) or 0 (Off)
            'recipients' => [],
        ];

        foreach ($mobiles as $mobile) {
            // Add mobile numbers and other variables as needed
            $payload['recipients'][] = [
                'mobiles' => $mobile,
                'VAR1' => 'VALUE1', // Replace with actual value
                'VAR2' => 'VALUE2', // Replace with actual value
            ];
        }

        // Send the request to the Msg91 API using withHeaders
        try {
            $response = Http::withHeaders($customHeaders)->post('https://control.msg91.com/api/v5/flow/', [
                'json' => $payload,
            ]);
            $statusCode = $response->status();

            if ($statusCode === 200) {
                // SMS sent successfully
                return redirect('sendsms')->with('success', 'SMS sent successfully');
            } else {
               
                return redirect('sendsms')->with('error', 'Failed to send SMS.');
            }
        } catch (\Exception $e) {
            // Handle exceptions if the request fails
            return redirect('sendsms')->with('error', 'Failed to send SMS. Exception: ' . $e->getMessage());
        }
    }

}
