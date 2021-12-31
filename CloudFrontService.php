<?php

namespace  App\Http\Services;
use Aws\CloudFront\CloudFrontClient; 
use Aws\Exception\AwsException;


class CloudFrontService
{
    private $cloudFrontClient = null;

    public function __construct()
    {
        $this->cloudFrontClient = new CloudFrontClient([
            //'profile' => 'default',
            'version' => '2018-06-18',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => env('CLOUDFRONT_KEY'),
                'secret' => env('CLOUDFRONT_SECRET'),
            ]
        ]);
    }

    function createInvalidation($callerReference,$paths,$quantity) {
        try {
            $result = $this->cloudFrontClient->createInvalidation([
                'DistributionId' => env('CLOUDFRONT_DISTRIBUTIONID'),
                'InvalidationBatch' => [
                    'CallerReference' => $callerReference,
                    'Paths' => [
                        'Items' => $paths,
                        'Quantity' => $quantity,
                    ],
                ]
            ]);

            return true;
        } catch (AwsException $e) {
            //return 'Error: ' . $e->getAwsErrorMessage();
            return false;
        }
    }
}