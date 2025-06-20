<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "GlikqB";

// Merchant Salt as provided by Payu
$SALT = "O47PE3ZT";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <h2>Buy Premium Coins</h2>
    <br/>
    <?php if($formError) { ?>
  
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="surl" value="<?php echo "http://www.a3ultimate.com/Payu/success.php" ?>" />
      <input type="hidden" name="furl" value="<?php echo "http://www.a3ultimate.com/Payu/faliure.php" ?>" />
      <table>
        <tr>
        </tr>
        <tr>
          <td>Amount in Rupee: <br>(You will 1 Premium Coins per Rupee Paid) </td>
          <td><input name="amount" placeholder='Amount to be paid' value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          </tr>
          <tr>
          <td>Name: </td>
          <td><input name="firstname" id="firstname" placeholder='Your Name' value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email address: </td>
          <td><input name="email" id="email"  placeholder='Email ID for Invoice' value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          </tr>
        <tr>
        <td>Mobile Number: </td>
          <td><input name="phone" placeholder=' 10 Digit Mobile Number' value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>A3Ultimate Username: </td>
          <td colspan="3"><textarea placeholder='Account in which you need Premium Coins' name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
       

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

       
        
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Make Payment" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>