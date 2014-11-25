vcl 4.0;

# Disable esi xml check on varnish Startup
# Example:
#   DAEMON_OPTS="-a :6081 \
#     -T localhost:6082 \
#     -p feature=+esi_disable_xml_check
#     -p feature=+esi_ignore_https
#

backend default {
    .host = "127.0.0.1";
    .port = "8085";
}

sub vcl_recv {
        if (req.method != "GET") {
                return (pass);
        }

        unset req.http.cookie;
        return (hash);
}

sub vcl_hash {
        hash_data(req.url);
        if (req.url ~ "/esi/header/user($|\?)")
        {
                hash_data(regsub(req.http.cookie, ".*PHPSESSID=([^;]+);.*", "\1"));
        }
        return(lookup);
}

sub vcl_backend_response {
        set beresp.do_esi = true;
        set beresp.ttl = 15m;

        unset beresp.http.Set-Cookie;
        unset beresp.http.Cache-Control;

        set beresp.http.Cache-Control = "public";
}
