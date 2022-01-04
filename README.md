# php-aws-cloudfront
Libreria para la implementación básica de cloudfront en PHP

## Requerimientos
<ul>
<li>PHP</li>
<li>Aws Sdk ~3.0</li>
<li>Keys de acceso de usuario para SNS con el fin de configurar las variables  env('CLOUDFRONT_KEY') y  env('CLOUDFRONT_SECRET').</li>
</ul>

Nota: Probado en versión 7.1 de PHP

## Uso
<p>$cloudfrontService = new PhpAwsCloudfront();</p>
<p>$cloudfrontService->createInvalidation($date[0],$images_path,1);</p>
