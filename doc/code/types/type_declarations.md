[⌂ Home](../../../README.md)
[▲ Previous: Type system](../types/type_system.md)

# Type declarations

## Definition

> In computer programming, a **declaration** in a syntactic language construct is the process of specifying identifier properties for its initialization: it declares a word's (identifier's) meaning. Declarations are most commonly used for functions, variables, constants, and classes, but can also be used for other entities such as enumerations and type definitions. Beyond the name (the identifier itself) and the kind of entity (function, variable, etc.), declarations typically specify the ***data type*** (for *variables* and *constants*), or the ***type signature*** (for *functions*); types may also include dimensions, such as for *arrays*.
>
> A declaration is used to announce the existence of the entity to the compiler; this is important in those strongly typed languages that require functions, variables, and constants, and their types to be specified with a declaration before use, and is used in forward declaration. The term "declaration" is frequently contrasted with the term "definition", but meaning and usage varies significantly between languages.

Declarations are particularly prominent in languages in the ALGOL tradition, including the BCPL family, most prominently C and C++, and also Pascal. Java uses the term "declaration", though Java does not require separate declarations and definitions.

### Declaration vs. definition

One basic dichotomy is whether or not a declaration contains a definition: for example, whether a variable or constant declaration specifies its value, or only its type; and similarly whether a declaration of a function specifies the body (implementation) of the function, or only its type signature. Not all languages make this distinction: in many languages, declarations always include a definition, and may be referred to as either "declarations" or "definitions", depending on the language. However, these concepts are distinguished in languages that require declaration before use (for which forward declarations are used), and in languages where interface and implementation are separated: the interface contains declarations, the implementation contains definitions.

In informal usage, a "declaration" refers only to a pure declaration (types only, no value or body), while a "definition" refers to a declaration that includes a value or body. However, in formal usage (in language specifications), "declaration" includes both of these senses, with finer distinctions by language: in C and C++, a declaration of a function that does not include a body is called a function prototype, while a declaration of a function that does include a body is called a "function definition". In Java declarations occur in two forms. For public methods they can be presented in interfaces as method signatures, which consist of the method names, input types and output type. A similar notation can be used in the definition of abstract methods, which do not contain a definition. The enclosing class can be instantiated, rather a new derived class, which provides the definition of the method, would need to be created in order to create an instance of the class. Starting with Java 8, the lambda expression was included in the language, which could be viewed as a function declaration.

-- [Wikipedia](https://en.wikipedia.org/wiki/Declaration_(computer_programming))

[▵ Up](#type-declarations)
[⌂ Home](../../../README.md)
[▲ Previous: Type system](../types/type_system.md)
