<?php

function someFunction(int $someArgument, string $otherArgument = "0"): string
{
    return "${someArgument} ${otherArgument}";
}

$functionReflection = new ReflectionFunction('someFunction');

print('Is deprecated bit? ' . $functionReflection::IS_DEPRECATED . PHP_EOL);

print(PHP_EOL);

print('Function identifier: ' . $functionReflection->name . PHP_EOL);

print(PHP_EOL);

print('Function identifier: ' . $functionReflection->getName() . PHP_EOL);
print('Short name: ' . $functionReflection->getShortName() . PHP_EOL);
print('Is in namespace? ' . $functionReflection->inNamespace() . PHP_EOL);
print('Namespace identifier: ' . $functionReflection->getNamespaceName() . PHP_EOL);

print(PHP_EOL);

print('Is internal? ' . $functionReflection->isInternal() . PHP_EOL);
print('Is user-defined? ' . $functionReflection->isUserDefined() . PHP_EOL);

print('Is variadic? ' . $functionReflection->isVariadic() . PHP_EOL);

print('Is deprecated? ' . $functionReflection->isDeprecated() . PHP_EOL);
print('Is disabled? ' . $functionReflection->isDisabled() . PHP_EOL);

print('Is static? ' . $functionReflection->isStatic() . PHP_EOL);
print('Is anonymous? ' . $functionReflection->isAnonymous() . PHP_EOL);

print(PHP_EOL);

print('Is closure? ' . $functionReflection->isClosure() . PHP_EOL);
print('Is generator? ' . $functionReflection->isGenerator() . PHP_EOL);

print(PHP_EOL);

print('Function file name: ' . $functionReflection->getFileName() . PHP_EOL);
print("File extension:\n");
var_dump($functionReflection->getExtension());
print("File extension name:\n");
var_dump($functionReflection->getExtensionName());

print(PHP_EOL);

print('Start line: ' . $functionReflection->getStartLine() . PHP_EOL);
print('End line: ' . $functionReflection->getEndLine() . PHP_EOL);

print(PHP_EOL);

print("Doc comment:\n");
var_dump($functionReflection->getDocComment());

print(PHP_EOL);

print("Method attributes:\n");
var_dump($functionReflection->getAttributes());

print(PHP_EOL);

print('Number of parameters: ' . $functionReflection->getNumberOfParameters() . PHP_EOL);
print('Number of reuired parameters: ' . $functionReflection->getNumberOfRequiredParameters() . PHP_EOL);
print("Parameters:\n");
var_dump($functionReflection->getParameters());

print(PHP_EOL);

print('Function has return type? ' . $functionReflection->hasReturnType() . PHP_EOL);
print('Function return type: ' . $functionReflection->getReturnType() . PHP_EOL);

print('Has tentative return type?' . $functionReflection->hasTentativeReturnType() . PHP_EOL);
print("Tentative return type:\n");
var_dump($functionReflection->getTentativeReturnType());

print('Returns reference? ' . $functionReflection->returnsReference() . PHP_EOL);

print(PHP_EOL);

print("Static variables:\n");
var_dump($functionReflection->getStaticVariables());

print(PHP_EOL);

print("Closure:\n");
var_dump($functionReflection->getClosure());
print("Closure scope class:\n");
var_dump($functionReflection->getClosureScopeClass());
print("Closure this:\n");
var_dump($functionReflection->getClosureThis());
print("Closure used variables:\n");
var_dump($functionReflection->getClosureUsedVariables());

print(PHP_EOL);

print("To string:\n" . $functionReflection->__toString() . PHP_EOL);

print(PHP_EOL);

print('Invocation result: ' . $functionReflection->invoke(3, "times lucky") . PHP_EOL);
print('Invocation result: ' . $functionReflection->invokeArgs([3, "times lucky"]) . PHP_EOL);
