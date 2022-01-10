@extends('layout.main')
@section('title', 'home')
@section('content')
    <test-tg></test-tg>
    <chat-modal></chat-modal>
    <?
//    use Telegram\Bot\Laravel\Facades\Telegram;
//    $response = Telegram::getUpdates([-1]);
    $result = Telegram::getWebhookUpdates();
//    $response = Telegram::getMe();

//    $botId = $response->getId();
//    $firstName = $response->getFirstName();
//    $username = $response->getUsername();
//
//
//    echo $response;
    ?>
<pre>
<!--    --><?// $message = $response->getUpdateId()?>
<!--    --><?//= var_dump($response)?>
<?= var_dump($result)?>
<!--    --><?//= var_dump($response.id)?>
</pre>
    <pre>
<!--        --><?//$res = json_encode($response)?>
<!--        --><?//= gettype($res)?>
<!--        --><?//= $response->getMessage()?>
{{--<!--        --><?//= $response->getUpdateId()?>--}}
<?// $res = $response ?>
{{--        <?= var_dump($res)?>--}}
{{--        <hr>--}}
<?//=$botId ?>
{{--        <hr>--}}
    </pre>
@endsection