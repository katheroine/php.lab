[⌂ Home](../../README.md)
[▲ Previous: PHP history](php_history.md)

# PHP features

* It is easy to install and learn.
* It is open-source and therefore free.
* It is fast and secure.
* It runs on various platforms (Windows, Linux, Unix, etc.).
* PHP can access cookies variable and set cookies.
* It supports many protocols, such as HTTP, POP3, LDAP, IMAP, SNMP, NNTP, and many more.
* It is well-connected with databases and supports a wide range of databases. This feature also makes it suitable for handling forms.
* Many references and learning materials for PHP are available over the internet.

– https://www.interviewbit.com/blog/features-of-php/

## Type safety

> **Type safety** is the extent to which a programming language discourages or prevents *type errors*.
>
> Type-safe languages are sometimes also called *strongly* or *strictly typed*. The behaviors classified as *type errors* by a given programming language are usually those that result from attempts to perform operations on values that are not of the appropriate *data type*, e.g. trying to add a `string` to an `integer`.
>
> Type enforcement can be ***static*** (catching potential errors at *compile time*), ***dynamic*** (associating type information with values at *run-time* and consulting them as needed to detect imminent errors), or a combination of both. *Dynamic* type enforcement can often run programs that would be invalid under *static* enforcement, but at the cost of introducing errors at runtime.
>
> In the context of *static* (compile-time) type systems, type safety usually involves (among other things) a guarantee that the eventual value of any expression will be a legitimate member of that expression's *static* type. The precise requirement is more subtle than this — see, for example, subtyping and polymorphism for complications.

-- [Wikipedia](https://en.wikipedia.org/wiki/Type_safety)

### Dynamically & statically typed languages

> **Dynamically-typed languages** are those (like JavaScript) where the interpreter assigns variables a type at runtime based on the variable's value at the time.

– https://developer.mozilla.org/en-US/docs/Glossary/Dynamic_typing

> A **statically-typed language** is a language (such as Java, C, or C++) where variable types are known at compile time. In most of these languages, types must be expressly indicated by the programmer; in other cases (such as OCaml), type inference allows the programmer to not indicate their variable types.

-- https://developer.mozilla.org/en-US/docs/Glossary/Static_typing

#### Is PHP statically or dynamically typed language?

**PHP is a dynamically typed language.**

There is no need (but there is some limited possibility) of determining the type of the variables during declaration. PHP is able to establish the type of the variable guessing it from its value.

PHP does support *optional type declarations* for function parameters, return types, and properties, which can provide some *static typing* features, but the core execution model remains dynamic.

```php
<?php

$n = null;
echo "\$n = null; // null: " . $n . " (" . gettype($n) . ")\n\n";

$b = true;
echo "\$b = true; // boolean: " . $b . " (" . gettype($b) . ")\n\n";

$i = 5;
echo "\$i = 5; // integer: " . $i . " (" . gettype($i) . ")\n\n";

$d = 2.4;
echo "\$d = 2.4; // floating point double precision: " . $d . " (" . gettype($d) . ")\n\n";

$s = "hello";
echo "\$s = \"hello\"; // string: " . $s . " (" . gettype($s) . ")\n\n";

$a = [3, 5, 7];
echo "\$a = [3, 5, 7]; // array:\n\n";

```

```console
$n = null; // null:  (NULL)

$b = true; // boolean: 1 (boolean)

$i = 5; // integer: 5 (integer)

$d = 2.4; // floating point double precision: 2.4 (double)

$s = "hello"; // string: hello (string)

$a = [3, 5, 7]; // array:

```

**View**:
[Example](../../example/features/dynamicaly_typed_language.php)

**Execute**:
* [OnlinePHP](https://onlinephp.io/c/a2017)
* [OneCompiler](https://onecompiler.com/php/4433mryxx)

Variables can hold values of different types throughout the execution of a program. This provides flexibility but can also introduce some challenges related to type safety and error handling.
For example, in PHP, you can assign a string value to a variable and later assign an integer value to the same variable without any explicit type declarations or conversions:

```php
$myVariable = "Hello, World!"; // Assigning a string value
$myVariable = 44; // Assigning an integer value to the same variable
```

PHP 7 introduced improved type declarations with features like *scalar type hints* and *return type declarations*. PHP 8 has a much more powerful and flexible type system.

### Strongly & weakly (loosely) typed languages

> Programming languages are often colloquially classified as ***strongly typed*** or ***weakly typed*** (also ***loosely typed***) to refer to certain aspects of type safety.
>
> In 1974, Liskov and Zilles defined a strongly-typed language as one in which *whenever an object is passed from a calling function to a called function, its type must be compatible with the type declared in the called function*.
>
> In 1977, Jackson wrote, *In a strongly typed language each data area will have a distinct type and each process will state its communication requirements in terms of these types*.
>
> In contrast, a ***weakly typed language*** may produce unpredictable results or may perform implicit type conversion.

-- [Wikipedia](https://en.wikipedia.org/wiki/Type_safety#Strong_and_weak_typing)

A programming language that does not demand the definition of a variable is known as a ***loosely typed language***.

For instance, Perl is a ***flexibly typed language*** that allows you to declare variables without having to specify the type of the variable.
The C programming language is an example of a ***strongly typed language***, which is the opposite of a ***weakly typed language***.

Strong and Loose/Weakly typed programming languages can be used to categorize all programming languages. Each of these classes has advantages and disadvantages in the realm of programming and defines how rigorous the programming language is.

A programming language for computers that does not data type of a variable is referred to as being loosely typed language. In comparison to strongly typed languages, this language makes it simple to define variables with various data types. A data type essentially tells the compiler what kind of value and actions this specific variable may store.

Strong bounds on the variable data type are not available in a loosely typed language. This kind of language's compiler executes the operation specified on it regardless of the data type it contains when doing compilation. The compiler ignores small errors depending on data types.

– https://www.javatpoint.com/what-is-loosely-typed-language

#### Is PHP strongly or weakly (loosely) typed language?

**PHP is a loosely typed language.**

PHP automatically associates a data type to the variable, depending on its value. Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.

In PHP 7, type declarations were added. This gives an option to specify the data type expected when declaring a function, and by enabling the strict requirement, it will throw a "Fatal Error" on a type mismatch.

– https://www.w3schools.com/php/php_variables.asp

```php
<?php

$someVariable = 1024;
print("\$someVariable = 1024; // " . $someVariable . " (" . gettype($someVariable) . ")\n\n");

$otherVariable = "hello";
print("\$otherVariable = \"hello\"; // " . $otherVariable . " (" . gettype($otherVariable) . ")\n\n");

$anotherVariable = $someVariable . $otherVariable;
print("\$anotherVariable = \$someVariable . \$otherVariable; // " . $anotherVariable . " (" . gettype($anotherVariable) . ")\n\n");

$someVariable = "bye";
print("\$someVariable = \"bye\"; // " . $someVariable . " (" . gettype($someVariable) . ")\n\n");

```

```console
$someVariable = 1024; // 1024 (integer)

$otherVariable = "hello"; // hello (string)

$anotherVariable = $someVariable . $otherVariable; // 1024hello (string)

$someVariable = "bye"; // bye (string)

```

**View**:
[Example](../../example/features/loosely_typed_language.php)

**Execute**:
* [OnlinePHP](https://onlinephp.io/c/9c4c2)
* [OneCompiler](https://onecompiler.com/php/4436y6tfy)

## Programming & scripting

### Computer programming

> **Computer programming** or **coding** is the composition of *sequences of instructions*, called ***programs***, that computers can follow to perform tasks. It involves designing and implementing algorithms, step-by-step specifications of procedures, by writing code in one or more ***programming languages***.
>
> Programmers typically use *high-level programming languages* that are more easily intelligible to humans than *machine code*, which is directly executed by the *central processing unit*. Proficient programming usually requires expertise in several different subjects, including knowledge of the *application domain*, details of *programming languages* and generic *code libraries*, specialized *algorithms*, and *formal logic*.
>
> Auxiliary tasks accompanying and related to programming include *analyzing requirements*, *testing*, *debugging* (investigating and fixing problems), implementation of build systems, and management of derived artifacts, such as programs' machine code. While these are sometimes considered programming, often the term ***software development*** is used for this larger overall process – with the terms programming, implementation, and coding reserved for the writing and editing of code per se. Sometimes *software development* is known as ***software engineering***, especially when it employs formal methods or follows an engineering design process.

-- [Wikipedia](https://en.wikipedia.org/wiki/Computer_programming)

### Computer programs & scripts

> A **computer program** is a *sequence or set of instructions* in a *programming language* for a computer to execute. It is one component of software, which also includes documentation and other intangible components.
>
> A computer program in its human-readable form is called *source code*. *Source code* needs another computer program to execute because computers can only execute their native *machine instructions*. Therefore, *source code* may be translated to *machine instructions* using a ***compiler*** written for the language. (*Assembly language* programs are translated using an *assembler*.) The resulting file is called an *executable*. Alternatively, *source code* may execute within an ***interpreter*** written for the language.
>
> If the *executable* is requested for *execution*, then the *operating system* loads it into *memory* and starts a *process*. The *central processing unit* will soon switch to this process so it can fetch, decode, and then *execute* each *machine instruction*.
>
> If the *source code* is requested for *execution*, then the *operating system* loads the corresponding ***interpreter*** into *memory* and starts a *process*. The ***interpreter*** then loads the *source code* into memory to *translate* and *execute* each statement. Running the source code is slower than running an executable. Moreover, the ***interpreter*** must be installed on the computer.

-- [Wikipedia](https://en.wikipedia.org/wiki/Computer_program)

> In computing, a **script** is a relatively short and simple *set of instructions* that typically automate an otherwise manual process. The act of writing a script is called ***scripting***.

-- [Wikipedia](https://en.wikipedia.org/wiki/Scripting_language)

### Programming & scripting languages

> A **programming language** is an artificial language for expressing *computer programs*.
>
> *Programming languages* typically allow software to be written in a human readable manner.
>
> Execution of a *program* requires an *implementation*. There are two main approaches for implementing a programming language – ***compilation***, where programs are compiled ahead-of-time to machine code, and ***interpretation***, where programs are directly executed. In addition to these two extremes, some implementations use hybrid approaches such as ***just-in-time compilation*** and ***bytecode interpreters***.
>
> The design of programming languages has been strongly influenced by *computer architecture*, with most imperative languages designed around the ubiquitous *von Neumann architecture*. While early programming languages were closely tied to the hardware, modern languages often hide hardware details via abstraction in an effort to enable better software with less effort.

-- [Wikipedia](https://en.wikipedia.org/wiki/Programming_language)

> A **scripting language** or **script language** is a ***programming language*** that is used for *scripting*.
>
> Originally, scripting was limited to *automating shells* in *operating systems*, and languages were relatively simple. Today, *scripting* is more pervasive and some *scripting languages* include modern features that allow them to be used to develop application software also.

-- [Wikipedia](https://en.wikipedia.org/wiki/Scripting_language)

### Is PHP programming or scripting language?

Both.

PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.

– https://www.php.net/manual/en/intro-whatis.php

PHP is a scripting language used mainly for server-side web development. Because of its open-source nature, PHP is a general-purpose language often used for other projects and graphical user interfaces.

– https://www.hostinger.com/tutorials/what-is-php

PHP stands for hypertext preprocessor. The PHP programming language is a scripting language used widely across the globe, primarily for web development. You can embed PHP into HTML and work after that too.

– https://hackr.io/blog/what-is-php

[▵ Up](#php-features)
[⌂ Home](../../README.md)
[▲ Previous: PHP history](php_history.md)
