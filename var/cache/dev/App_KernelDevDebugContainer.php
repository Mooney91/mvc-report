<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYQNhB5t\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYQNhB5t/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerYQNhB5t.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerYQNhB5t\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerYQNhB5t\App_KernelDevDebugContainer([
    'container.build_hash' => 'YQNhB5t',
    'container.build_id' => 'b81706e8',
    'container.build_time' => 1682417191,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYQNhB5t');
