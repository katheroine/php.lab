<?php

class SomeClass
{
    /**
     * Some PHPDoc comment.
     */
    #[SomeAttribute]
    private string $someProperty = "hello";
}

$someObject = new SomeClass();

$classReflection = new ReflectionClass('SomeClass');
$properties = $classReflection->getProperties();
$property = $classReflection->getProperty('someProperty');

print("Properties:\n");
var_dump($properties);
print("Property someProperty:\n");
var_dump($property);

print(PHP_EOL);

$propertyReflection = new ReflectionProperty('SomeClass', 'someProperty');

print('Is public bit? ' . $propertyReflection::IS_PUBLIC . PHP_EOL);
print('Is protected bit? ' . $propertyReflection::IS_PROTECTED . PHP_EOL);
print('Is private bit? ' . $propertyReflection::IS_PRIVATE . PHP_EOL);
print('Is read-only bit? ' . $propertyReflection::IS_READONLY . PHP_EOL);
print('Is static bit? ' . $propertyReflection::IS_STATIC . PHP_EOL);

print(PHP_EOL);

print('Property identifier: ' . $propertyReflection->name . PHP_EOL);
print('Class identifier: ' . $propertyReflection->class . PHP_EOL);

print(PHP_EOL);

print('Property identifier: ' . $propertyReflection->getName() . PHP_EOL);
print('Property has type? ' . $propertyReflection->hasType() . PHP_EOL);
print('Property type: ' . $propertyReflection->getType() . PHP_EOL);
print('Property has default value? ' . $propertyReflection->hasDefaultValue() . PHP_EOL);
print('Property default value: ' . $propertyReflection->getDefaultValue() . PHP_EOL);
print('Property value: ' . $propertyReflection->getValue($someObject) . PHP_EOL);
print('Property modifiers bit: ' . $propertyReflection->getModifiers() . PHP_EOL);

print(PHP_EOL);

print('Is public? ' . $propertyReflection->isPublic() . PHP_EOL);
print('Is protected? ' . $propertyReflection->isProtected() . PHP_EOL);
print('Is private? ' . $propertyReflection->isPrivate() . PHP_EOL);
print('Is read-only? ' . $propertyReflection->isReadOnly() . PHP_EOL);
print('Is static? ' . $propertyReflection->isStatic() . PHP_EOL);
print('Is default? ' . $propertyReflection->isDefault() . PHP_EOL);
print('Is initialized? ' . $propertyReflection->isInitialized($someObject) . PHP_EOL);
print('Is promoted? ' . $propertyReflection->isPromoted() . PHP_EOL);

print(PHP_EOL);

print("Property doc comment:\n" . $propertyReflection->getDocComment() . PHP_EOL);

print(PHP_EOL);

print("Property attributes:\n");
var_dump($propertyReflection->getAttributes());

print(PHP_EOL);

print("To string:\n" . $propertyReflection->__toString() . PHP_EOL);

print(PHP_EOL);

print("Declaring class:\n");
var_dump($propertyReflection->getDeclaringClass());

print(PHP_EOL);

$propertyReflection->setAccessible(true);
$propertyReflection->setValue($someObject, "welcome");
print('Property value: ' . $propertyReflection->getValue($someObject) . PHP_EOL);
