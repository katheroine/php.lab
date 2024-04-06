<?php

class SomeClass
{
    /**
     * Some PHPDoc comment.
     */
    #[SomeAttribute]
    private const SOME_CONSTANT = 1024;
}

$classReflection = new ReflectionClass('SomeClass');
$constants = $classReflection->getConstants();
$constantValue = $classReflection->getConstant('SOME_CONSTANT');

print("Constants:\n");
var_dump($constants);
print('Constant SOME_CONSTANT value: ' . $constantValue . PHP_EOL);

print(PHP_EOL);

$classConstantReflection = new ReflectionClassConstant('SomeClass', 'SOME_CONSTANT');

print('Is public bit? ' . $classConstantReflection::IS_PUBLIC . PHP_EOL);
print('Is protected bit? ' . $classConstantReflection::IS_PROTECTED . PHP_EOL);
print('Is private bit? ' . $classConstantReflection::IS_PRIVATE . PHP_EOL);
print('Is final bit? ' . $classConstantReflection::IS_FINAL . PHP_EOL);

print(PHP_EOL);

print('Constant identifier: ' . $classConstantReflection->name . PHP_EOL);
print('Class identifier: ' . $classConstantReflection->class . PHP_EOL);

print(PHP_EOL);

print('Constant identifier: ' . $classConstantReflection->getName() . PHP_EOL);
print('Constant value: ' . $classConstantReflection->getValue() . PHP_EOL);
print('Constant modifiers bit: ' . $classConstantReflection->getModifiers() . PHP_EOL);

print(PHP_EOL);

print('Is public? ' . $classConstantReflection->isPublic() . PHP_EOL);
print('Is protected? ' . $classConstantReflection->isProtected() . PHP_EOL);
print('Is private? ' . $classConstantReflection->isPrivate() . PHP_EOL);
print('Is final? ' . $classConstantReflection->isFinal() . PHP_EOL);
print('Is enum case? ' . $classConstantReflection->isEnumCase() . PHP_EOL);

print(PHP_EOL);

print("Constant doc comment:\n" . $classConstantReflection->getDocComment() . PHP_EOL);

print(PHP_EOL);

print("Constant attributes:\n");
var_dump($classConstantReflection->getAttributes());

print(PHP_EOL);

print("To string:\n" . $classConstantReflection->__toString() . PHP_EOL);

print(PHP_EOL);

print("Declaring class:\n");
var_dump($classConstantReflection->getDeclaringClass());
