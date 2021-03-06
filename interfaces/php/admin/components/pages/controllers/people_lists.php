<?php
$list_response = $cash_admin->requestAndStore(
	array(
		'cash_request_type' => 'people', 
		'cash_action' => 'getlistsforuser',
		'user_id' => AdminHelper::getPersistentData('cash_effective_user')
	),
	'getlistsforuser'
);

// lists
if (is_array($list_response['payload'])) {
	$cash_admin->page_data['lists_all'] = new ArrayIterator($list_response['payload']);
}

$cash_admin->page_data['list_connection_options'] = AdminHelper::echoConnectionsOptions('lists',true);

$cash_admin->setPageContentTemplate('people_lists');
?>