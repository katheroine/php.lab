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

#### ✻ Is PHP statically or dynamically typed language?

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

#### ✻ Is PHP strongly or weakly (loosely) typed language?

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

#### ✻ Is PHP programming or scripting language?

Both.

PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.

– https://www.php.net/manual/en/intro-whatis.php

PHP is a scripting language used mainly for server-side web development. Because of its open-source nature, PHP is a general-purpose language often used for other projects and graphical user interfaces.

– https://www.hostinger.com/tutorials/what-is-php

PHP stands for hypertext preprocessor. The PHP programming language is a scripting language used widely across the globe, primarily for web development. You can embed PHP into HTML and work after that too.

– https://hackr.io/blog/what-is-php

## Compiling and interpreting

### Phases in creating an executable program

In case of compiled programming languages there are following phases of creating an *executable* from the *source code*:

* Preprocessing
* Compilation
* Linking

#### Preprocessing

Before the code is subjected to the compilation process, preprocessor operations are performed on it.

> In computer science, a **preprocessor** (or **precompiler**) is a program that processes its input data to produce output that is used as input in another program. The output is said to be a preprocessed form of the input data, which is often used by some subsequent programs like compilers.
>
> The amount and kind of processing done depends on the nature of the preprocessor; some preprocessors are only capable of performing relatively simple *textual substitutions* and *macro expansions*, while others have the power of full-fledged *programming languages*.
>
> A common example from computer programming is the processing performed on source code before the next step of compilation. In some computer languages (e.g., C and PL/I) there is a phase of translation known as *preprocessing*. It can also include *macro processing*, *file inclusion* and *language extensions*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Preprocessor)

#### ✻ Is there a preprosessing in the PHP?

There is not something like *preprocessing* in PHP, but some tasks usually done by the preprocessor in the compiled languages are handled in PHP by the functions:

* ***file inclusion*** performed by functions:
    * [**`include`**]() - inserts file content; issues a warning if the file is missing but continues execution,
    * [**`require`**]() - inserts file content; triggers a fatal error and halts execution if the file is missing,
    * [**`include_once`**]() - inserts file content only once, even if called multiple times, preventing redefinition errors; issues a warning if the file is missing but continues execution,
    * [**`require_once`**]() - inserts file content only once, even if called multiple times, preventing redefinition errors; triggers a fatal error and halts execution if the file is missing.;
* ***constants definition*** peformed by:
    * [**`define`**](https://www.php.net/manual/en/function.define.php) function;
    * [**`const`**](https://www.w3schools.com/php/keyword_const.asp) keyword;
* ***execution directive***: [**`declare`**](https://www.php.net/manual/en/control-structures.declare.php) - a construct used to set execution directives for a block of code
* **macro expansions**: [**`eval`**](https://www.php.net/manual/en/function.eval.php) function - evaluates a string as PHP code;
* **conditional logic**:
    * [**`if`**](https://www.php.net/manual/en/control-structures.if.php) construct - allows for conditional execution of code fragments,
    * [**`defined`**](https://www.php.net/manual/en/function.defined.php) function - checks whether a constant with the given name exists,
    * [**`function_exists`**](https://www.php.net/manual/en/function.function-exists.php) function - checks if the given function has been defined.

#### Compilation

Compilation, in its most popular meaning, is transforming the source code into the machine code.

> In computing, a **compiler** is software that translates *computer code* written in one *programming language* (the *source language*) into another language (the *target language*). The name *compiler* is primarily used for programs that translate source code from a *high-level programming language* to a *low-level programming language* (e.g. *assembly language*, *object code*, or *machine code*) to create an executable program.
>
> There are many different types of compilers which produce output in different useful forms:
> * a ***cross-compiler*** produces code for a different CPU or operating system than the one on which the cross-compiler itself runs;
> * a ***bootstrap compiler*** is often a temporary compiler, used for compiling a more permanent or better optimized compiler for a language.

-- [Wikipedia](https://en.wikipedia.org/wiki/Compiler)

##### Stages of compilation

The stages include a *front end*, a *middle end*, and a *back end*.

###### *Front end*

The ***front end*** scans the input and verifies *syntax* and *semantics* according to a specific source language. For statically typed languages it performs *type checking* by collecting type information. If the input program is syntactically incorrect or has a *type error*, it generates error and/or warning messages, usually identifying the location in the source code where the problem was detected; in some cases the actual error may be (much) earlier in the program.

> ***Syntax***
> * In *linguistics*, ***syntax*** is the study of how words and *morphemes* (any of the smallest meaningful constituents within a linguistic expression and particularly within a word) combine to form larger units such as phrases and sentences. Central concerns of syntax include word order, grammatical relations, hierarchical sentence structure (constituency), agreement, the nature of crosslinguistic variation, and the relationship between form and meaning (semantics). Diverse approaches, such as generative grammar and functional grammar, offer unique perspectives on syntax, reflecting its complexity and centrality to understanding human language.
> * In *logic*, ***syntax*** is an arrangement of well-structured entities in the formal languages or formal systems that express something. Syntax is concerned with the rules used for constructing or transforming the symbols and words of a language, as contrasted with the semantics of a language, which is concerned with its meaning.
> * In *programming*, the ***syntax*** of computer source code is code structured and ordered restricted to computer language rules. Like a natural language, a computer language (i.e. a programming language) defines the syntax that is valid for that language. A syntax error occurs when syntactically invalid source code is processed by an tool such as a compiler or interpreter.

-- Wikipedia: [linguistics](https://en.wikipedia.org/wiki/Syntax), [logic](https://en.wikipedia.org/wiki/Syntax_(logic)), [programming](https://en.wikipedia.org/wiki/Syntax_(programming_languages))

> ***Semantics***
> * In linguistics, ***semantics*** is the study of linguistic meaning. It examines what meaning is, how words get their meaning, and how the meaning of a complex expression depends on its parts. Part of this process involves the distinction between *sense* and *reference*. *Sense* is given by the ideas and concepts associated with an expression while *reference* is the object to which an expression points. Semantics contrasts with *syntax*, which studies the rules that dictate how to create grammatically correct sentences, and *pragmatics*, which investigates how people use language in communication. Semantics, together with *syntactics* and *pragmatics*, is a part of *semiotics*.
> * In *logic*, the ***semantics*** or *formal semantics* is the study of the meaning and interpretation of formal languages, formal systems, and (idealizations of) natural languages. This field seeks to provide precise mathematical models that capture the pre-theoretic notions of truth, validity, and logical consequence. While *logical syntax* concerns the formal rules for constructing well-formed expressions, logical semantics establishes frameworks for determining when these expressions are true and what follows from them.
> * In *programming language theory*, ***semantics*** is the rigorous mathematical logic study of the meaning of programming languages. Semantics assigns computational meaning to valid strings in a programming language syntax. It is closely related to, and often crosses over with, the semantics of mathematical proofs.
Semantics describes the processes a computer follows when executing a program in that specific language. This can be done by describing the relationship between the input and output of a program, or giving an explanation of how the program will be executed on a certain platform, thereby creating a model of computation.

-- Wikipedia: [linguistics](en.wikipedia.org/wiki/Semantics), [logic](https://en.wikipedia.org/wiki/Semantics_(logic)), [programming](https://en.wikipedia.org/wiki/Semantics_(computer_science))

The *front end* transforms the input program into an  internal representation of the program, called the ***intermediate representation*** (***IR***) for further processing by the middle end. This *IR* is usually a lower-level representation of the program with respect to the *source code*. Ther *front end* manages the **symbol table**, a data structure mapping each symbol in the *source code* to associated information such as location, type and scope.

> An **intermediate representation** (**IR**) is the *data structure* or *code* used internally by a *compiler* or *virtual machine* to represent *source code*. An *IR* is designed to be conducive to further processing, such as optimization and translation. A "good" IR must be accurate - capable of representing the source code without loss of information - and independent of any particular source or target language. An *IR* may take one of several forms: an *in-memory data structure*, or a special *tuple- or stack-based code* readable by the program. In the latter case it is also called an *intermediate language*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Intermediate_representation)

Aspects of the *front end* include:
* ***Lexical analysis*** (also known as ***lexing*** or ***tokenization***) breaks the source code text into a sequence of small pieces called *lexical tokens*. This phase can be divided into two stages: the *scanning*, which segments the input text into syntactic units called *lexemes* and assigns them a category; and the *evaluating*, which converts *lexemes* into a processed value. A *token* is a pair consisting of a token name and an optional token value. Common token categories may include identifiers, keywords, separators, operators, literals and comments, although the set of token categories varies in different programming languages. The *lexeme* syntax is typically a *regular language*, so a finite-state automaton constructed from a *regular expression* can be used to recognize it. The software doing lexical analysis is called a *lexical analyzer*. This may not be a separate step - it can be combined with the parsing step in scannerless parsing, in which case parsing is done at the character level, not the token level.
* ***Syntax analysis*** (also known as ***parsing***) involves parsing the *token* sequence to identify the syntactic structure of the program. This phase typically builds a *parse tree*, which replaces the linear sequence of tokens with a tree structure built according to the rules of a *formal grammar* which define the language's syntax. The *parse tree* is often analyzed, augmented, and transformed by later phases in the compiler.
* ***Semantic analysis*** adds semantic information to the *parse tree* and builds the *symbol table*. This phase performs semantic checks such as *type checking* (checking for *type errors*), or *object binding* (associating variable and function references with their definitions), or *definite assignment* (requiring all local variables to be initialized before use), rejecting incorrect programs or issuing warnings. Semantic analysis usually requires a complete *parse tree*, meaning that this phase logically follows the parsing phase, and logically precedes the code generation phase, though it is often possible to fold multiple phases into one pass over the code in a compiler implementation.

[▵ Up](#php-features)
[⌂ Home](../../README.md)
[▲ Previous: PHP history](php_history.md)
