<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVGpk2cs\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVGpk2cs/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVGpk2cs.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVGpk2cs\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVGpk2cs\App_KernelDevDebugContainer([
    'container.build_hash' => 'VGpk2cs',
    'container.build_id' => 'b77e1bbc',
    'container.build_time' => 1744957501,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVGpk2cs');
