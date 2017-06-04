<?php
function get( $url, $_header = NULL )
{
	$curl = curl_init();
	if( stripos($url, 'https://') !==FALSE )
	{
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	}

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	if ( $_header != NULL )
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, $_header);
	}
	$ret	= curl_exec($curl);
	$info	= curl_getinfo($curl);
	curl_close($curl);

	if( intval( $info["http_code"] ) == 200 )
	{
		return $ret;
	}

	return false;
}
/*
 * post method
 */
function post( $url, $param, $_header = NULL )
{
    $curl	= curl_init();
	if( stripos( $url, 'https://') !== FALSE )
	{
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	}

	$postfields	= NULL;
	if ( is_string($param) ) $postfields = $param;
	else
	{
		$args	= array();
		foreach ( $param as $key => $val)
		{
			$args[]	= $key . '=' . urlencode($val);
		}

		$postfields	= implode('&', $args);
		unset($args);
	}

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
	if ( $_header != NULL )
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, $_header);
	}
	$ret	= curl_exec($curl);
	$info	= curl_getinfo($curl);
	curl_close($curl);

	if( intval($info['http_code']) == 200 )
	{
		return $ret;
	}

	return false;
}

?>
