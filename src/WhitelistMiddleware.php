<?php

namespace lorenzoaiello\LaravelIPWhitelisting;

use Closure;
use Illuminate\Http\Request;
use lorenzoaiello\Cidr\CIDR;

class WhitelistMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param Request  $request
     * @param \Closure $next
     *
     * @return mixed
     * @throws NotWhitelistedException
     */
    public function handle(Request $request, Closure $next)
    {
        $source_ip = $request->ip();
        
        $configued_ip_whitelist = env('IP_WHITELIST','127.0.0.1');
        $ip_whitelist = explode(',',$configued_ip_whitelist);
    
        if(CIDR::matchMulti($source_ip,$ip_whitelist)) {
            return $next($request);
        }
        
        throw NotWhitelistedException::IPNotAllowed($source_ip);
    }
    
}