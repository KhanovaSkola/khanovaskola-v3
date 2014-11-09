#
# Requires Varnish 4
#
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

sub vcl_hash {
	hash_data(req.url);
	if (req.url ~ "/esi/headeruser($|\?)")
	{
		set req.http.X-SID = regsub(req.http.cookie, ".*PHPSESSID=([^;]+);.*", "\1");
		hash_data(req.http.X-SID);
		remove req.http.X-SID;
	}
	return (hash);
}

sub vcl_recv {
	if (req.request != "GET") {
		return (pass);
	}
	return (lookup);
}

sub vcl_fetch {
	set beresp.do_esi = true;
    set beresp.ttl = 15m;
}
