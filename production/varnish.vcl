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
        if (req.http.Cookie ~ "\bvarnish-force=pass") {
                return (pass);
        }

        return (hash);
}

sub vcl_hash {
        hash_data(req.url);
        return(lookup);
}

sub vcl_backend_response {
        if (beresp.http.Cache-Control != "public") {
                set beresp.uncacheable = true;
                return (deliver);
        }

        set beresp.do_esi = true;
        set beresp.ttl = 15m;

        unset beresp.http.Set-Cookie;
}
