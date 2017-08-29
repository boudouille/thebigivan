<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;

class CollaboratorNotUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project = Project::find(request('project_id'));
        $emailCreator = User::find($project->user_id);


        if(request('email') != $emailCreator->email)
        {
            return $next($request);
        }
        else
        {
            return back()->withErrors(['The email is that of the creator.']);
        }

    }
}
