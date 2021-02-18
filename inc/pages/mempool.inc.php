<h1>内存池</h1>
<br />

<table class="table table-striped table-condensed">
<tr>
  <th>交易编号</th>
  <th>发送数量</th>
</tr>

<?php
$tx_ids = $_SESSION[$rpc_client]->getrawmempool();

if (empty($tx_ids)) {
  echo "<tr><td colspan='2'>当前内存池为空.</td></tr>";
} else {

	$tx = array(