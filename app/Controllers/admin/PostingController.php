
private function sendToTwitterZapier($caption)
{
    $webhookUrl = 'https://hooks.zapier.com/hooks/catch/23804860/u2170s1/';

    $client = \Config\Services::curlrequest();

    $payload = [
        'caption' => $caption
    ];

    try {
        $client->post($webhookUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode($payload)
        ]);
    } catch (\Exception $e) {
        log_message('error', 'Zapier webhook failed: ' . $e->getMessage());
    }
}
