<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOq3g7oX\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOq3g7oX/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOq3g7oX.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOq3g7oX\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOq3g7oX\App_KernelDevDebugContainer([
    'container.build_hash' => 'Oq3g7oX',
    'container.build_id' => '1091c1d7',
    'container.build_time' => 1683096123,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOq3g7oX');
