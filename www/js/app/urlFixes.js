/**
 * Fix for Facebook callaback, removes #_=_
 * @see http://stackoverflow.com/a/7297873/326257
 */
if (window.location.hash && window.location.hash == '#_=_') {
    window.location.hash = '';
}

/**
 * Removes _fid parameter from url
 * @see http://forum.nette.org/cs/4405-flash-zpravicky-bez-fid-v-url#p43713
 */
if (window.history.replaceState) {
    l = window.location.toString();
    uri = l.indexOf('_fid=');
    if (uri != -1) {
        uri = l.substr(0, uri) + l.substr(uri + 10);
        if ((uri.substr(uri.length - 1) == '?') || (uri.substr(uri.length - 1) == '&')) {
            uri = uri.substr(0, uri.length - 1);
        }
        window.history.replaceState('', document.title, uri);
    }
}
