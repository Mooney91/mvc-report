<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFkvPsxV\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFkvPsxV/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFkvPsxV.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFkvPsxV\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFkvPsxV\App_KernelDevDebugContainer([
    'container.build_hash' => 'FkvPsxV',
    'container.build_id' => '06d7023a',
    'container.build_time' => 1683752019,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFkvPsxV');
