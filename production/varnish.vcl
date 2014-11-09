vcl 4.0;

# Disable esi xml check on varnish Startup
# Example:
#   DAEMON_OPTS="-a :6081 \
#     -T localhost:6082 \
#     -p feature=+esi_disable_xml_check
#

backend default {
    .host = "127.0.0.1";
    .port = "8085";
}

sub vcl_recv {
	if (req.method != "GET") {
		return (pass);
	}
	return (hash);
}

sub vcl_hash {
	hash_data(req.url);
	if (req.url ~ "/esi/headeruser($|\?)")
	{
		hash_data(regsub(req.http.cookie, ".*PHPSESSID=([^;]+);.*", "\1"));
	}
	return (lookup);
}

sub vcl_backend_response {
	set beresp.do_esi = true;
	set beresp.ttl = 15m;
}
