<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\NestedWithParametersController\Photos;

use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Models\Comment;

class CommentsController
{
    public function show(Comment $comment)
    {
    }

    public function edit(Comment $comment)
    {
    }
}
