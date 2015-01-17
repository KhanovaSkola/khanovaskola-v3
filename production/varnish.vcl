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

import std;

sub vcl_recv {
        if (req.method != "GET")
        {
                return (pass);
        }
        if (req.http.Cookie ~ "\bvarnish-force=pass")
        {
                return (pass);
        }

        if (req.url ~ "/esi/header")
        {
                set req.http.Cookie = ";" + req.http.Cookie;
                set req.http.Cookie = regsuball(req.http.Cookie, "; +", ";");
                set req.http.Cookie = regsuball(req.http.Cookie, ";(PHPSESSID)=", "; \1=");
                set req.http.Cookie = regsuball(req.http.Cookie, ";[^ ][^;]*", "");
                set req.http.Cookie = regsuball(req.http.Cookie, "^[; ]+|[; ]+$", "");
                if (req.http.Cookie == "")
                {
                        unset req.http.Cookie;
                }
        }

        return (hash);
}

sub vcl_hash {
        hash_data(req.http.host);
        hash_data(req.url);
        if (req.url ~ "/esi/header/")
        {
                hash_data(req.http.Cookie);
        }
        return(lookup);
}

sub vcl_backend_response {
        if (bereq.url ~ "/esi/header/")
        {
                unset beresp.http.Pragma;
                unset beresp.http.Cache-control;
                set beresp.ttl = 30m;
        }
        else if (beresp.http.Cache-Control != "public")
        {
                set beresp.uncacheable = true;
                set beresp.ttl = 3m;
                return (deliver);
        }

        set beresp.do_esi = true;
        set beresp.ttl = std.duration(beresp.http.Varnish-TTL, 15m);

        unset beresp.http.Set-Cookie;
}
