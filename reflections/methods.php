<?php

class SomeClass
{
    /**
     * Some PHPDoc comment.
     */
    #[SomeAttribute]
    public function someMethod(string $name): string
    {
        return "Hello, {$name}!";
    }
}

$someObject = new SomeClass();

$classReflection = new ReflectionClass('SomeClass');
$methods = $classReflection->getMethods();
$method = $classReflection->getMethod('someMethod');

print("Methods:\n");
var_dump($methods);
print("Method someMethod:\n");
var_dump($method);

print(PHP_EOL);

$methodReflection = new ReflectionMethod('SomeClass', 'someMethod');

print('Is public bit? ' . $methodReflection::IS_PUBLIC . PHP_EOL);
print('Is protected bit? ' . $methodReflection::IS_PROTECTED . PHP_EOL);
print('Is private bit? ' . $methodReflection::IS_PRIVATE . PHP_EOL);
print('Is static bit? ' . $methodReflection::IS_STATIC . PHP_EOL);
print('Is final bit? ' . $methodReflection::IS_FINAL . PHP_EOL);
print('Is abstract bit? ' . $methodReflection::IS_ABSTRACT . PHP_EOL);

print(PHP_EOL);

print('Method identifier: ' . $methodReflection->name . PHP_EOL);
print('Class identifier: ' . $methodReflection->class . PHP_EOL);

print(PHP_EOL);

print('Method identifier: ' . $methodReflection->getName() . PHP_EOL);
print('Is in namespace? ' . $classReflection->inNamespace() . PHP_EOL);
print('Namespace identifier: ' . $methodReflection->getNamespaceName() . PHP_EOL);

print(PHP_EOL);

print('Method has return type? ' . $methodReflection->hasReturnType() . PHP_EOL);
print('Method return type: ' . $methodReflection->getReturnType() . PHP_EOL);
print('Method modifiers bit: ' . $methodReflection->getModifiers() . PHP_EOL);

print(PHP_EOL);

print('Is public? ' . $methodReflection->isPublic() . PHP_EOL);
print('Is protected? ' . $methodReflection->isProtected() . PHP_EOL);
print('Is private? ' . $methodReflection->isPrivate() . PHP_EOL);
print('Is static? ' . $methodReflection->isStatic() . PHP_EOL);
print('Is final? ' . $methodReflection->isFinal() . PHP_EOL);
print('Is abstract? ' . $methodReflection->isAbstract() . PHP_EOL);

print('Is internal? ' . $methodReflection->isInternal() . PHP_EOL);
print('Is user-defined? ' . $methodReflection->isUserDefined() . PHP_EOL);

print('Is variadic? ' . $methodReflection->isVariadic() . PHP_EOL);
print('Is deprecated? ' . $methodReflection->isDeprecated() . PHP_EOL);

print(PHP_EOL);

print('Is closure? ' . $methodReflection->isClosure() . PHP_EOL);
print('Is generator? ' . $methodReflection->isGenerator() . PHP_EOL);
print('Is constructor? ' . $methodReflection->isConstructor() . PHP_EOL);
print('Is destructor? ' . $methodReflection->isDestructor() . PHP_EOL);

print(PHP_EOL);

print('Short name: ' . $methodReflection->getShortName() . PHP_EOL);
print('Start line: ' . $methodReflection->getStartLine() . PHP_EOL);
print('End line: ' . $methodReflection->getEndLine() . PHP_EOL);

print(PHP_EOL);

print('Class file name: ' . $methodReflection->getFileName() . PHP_EOL);
print("Class extension:\n");
var_dump($methodReflection->getExtension());
print("Class extension name:\n");
var_dump($methodReflection->getExtensionName());

print(PHP_EOL);

print("Method attributes:\n");
var_dump($methodReflection->getAttributes());

print(PHP_EOL);

print("Doc comment:\n");
var_dump($methodReflection->getDocComment());

print(PHP_EOL);

print('Number of parameters: ' . $methodReflection->getNumberOfParameters() . PHP_EOL);
print('Number of reuired parameters: ' . $methodReflection->getNumberOfRequiredParameters() . PHP_EOL);
print("Parameters:\n");
var_dump($methodReflection->getParameters());

print(PHP_EOL);

print("Static variables:\n");
var_dump($methodReflection->getStaticVariables());

print(PHP_EOL);

print('Has tentative return type?' . $methodReflection->hasTentativeReturnType() . PHP_EOL);
print("Tentative return type:\n");
var_dump($methodReflection->getTentativeReturnType());
print('Returns reference?' . $methodReflection->returnsReference() . PHP_EOL);

print(PHP_EOL);

print('Has prototype? ' . $methodReflection->hasPrototype() . PHP_EOL);
// print("Prototype:\n");
// var_dump($methodReflection->getPrototype());

print(PHP_EOL);

print("Closure:\n");
var_dump($methodReflection->getClosure($someObject));
print("Closure scope class:\n");
var_dump($methodReflection->getClosureScopeClass());
print("Closure this:\n");
var_dump($methodReflection->getClosureThis());
print("Closure used variables:\n");
var_dump($methodReflection->getClosureUsedVariables());

print(PHP_EOL);

print("To string:\n" . $methodReflection->__toString() . PHP_EOL);

print(PHP_EOL);

print("Declaring class:\n");
var_dump($methodReflection->getDeclaringClass());

print(PHP_EOL);

$methodReflection->setAccessible(true);
print('Invocation result: ' . $methodReflection->invoke($someObject, "Moly") . PHP_EOL);
print('Invocation result: ' . $methodReflection->invokeArgs($someObject, ["Moly"]) . PHP_EOL);
