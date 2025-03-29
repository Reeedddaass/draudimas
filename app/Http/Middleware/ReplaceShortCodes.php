<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ShortCode;

class ReplaceShortCodes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof \Illuminate\Http\Response && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $content = $response->getContent();

            $shortcodes = ShortCode::all();

            foreach ($shortcodes as $shortcode) {
                $placeholder = '[[' . $shortcode->shortcode . ']]';
                $content = str_replace($placeholder, $shortcode->replace, $content);
            }

            $response->setContent($content);
        }

        return $response;
    }
}
