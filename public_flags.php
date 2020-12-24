<?php
if(isset($_GET['discord_id'])) {
  $discord_id = htmlspecialchars($_GET['discord_id'],ENT_QUOTES);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://discordapp.com/api/users/".$discord_id);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: your_discord_token'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $req = curl_exec($ch);
  curl_close ($ch);
  $json_response = json_decode($req, true);
  if(isset($json_response['discriminator']) && isset($json_response['username'])) {
    $public_flags = $json_response['public_flags'];

    $flags = array (
      131072 => 'VERIFIED_DEVELOPER',
      65536 => 'VERIFIED_BOT',
      16384 => 'BUG_HUNTER_LEVEL_2',
      4096 => 'SYSTEM',
      1024 => 'TEAM_USER',
      512 => 'PREMIUM_EARLY_SUPPORTER',
      256 => 'HYPESQUAD_ONLINE_HOUSE_3',
      128 => 'HYPESQUAD_ONLINE_HOUSE_2',
      64 => 'HYPESQUAD_ONLINE_HOUSE_1',
      8 => 'BUG_HUNTER_LEVEL_1',
      4 => 'HYPESQUAD',
      2 => 'PARTNER',
      1 => 'STAFF'
    );

    $str_flags = array();

    foreach($flags as $key => $value) {
      if($public_flags == $key) {
        array_push($str_flags,$value);
        $public_flags = $public_flags - $key;
        break;
      }
    }

    while($public_flags != 0) {
      foreach($flags as $key => $value) {
        if($public_flags >= $key) {
          array_push($str_flags,$value);
          $public_flags = $public_flags - $key;
        }
      }
    }

    foreach($str_flags as $item) {
      echo "<p>".$item."</p>";
    }
  }
}
?>
