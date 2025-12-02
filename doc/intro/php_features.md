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

### Creating an executable program in compiled runtime environment

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

The ***front end*** analyzes the *source code* to build an internal representation of the program, called the *intermediate representation* (*IR*). It also manages the *symbol table*, a data structure mapping each symbol in the *source code* to associated information such as location, type and scope.

While the front end can be a single monolithic function or program, as in a scannerless parser, it was traditionally implemented and analyzed as several phases, which may execute sequentially or concurrently. This method is favored due to its modularity and separation of concerns.

-- [Wikipedia](https://en.wikipedia.org/wiki/Compiler#Front_end)

The *front end* transforms the input program into an  internal representation of the program, called the ***intermediate representation*** (***IR***) for further processing by the middle end. This *IR* is usually a lower-level representation of the program with respect to the *source code*. Ther *front end* manages the **symbol table**, a data structure mapping each symbol in the *source code* to associated information such as location, type and scope.

> An **intermediate representation** (**IR**) is the *data structure* or *code* used internally by a *compiler* or *virtual machine* to represent *source code*. An *IR* is designed to be conducive to further processing, such as optimization and translation. A "good" IR must be accurate - capable of representing the source code without loss of information - and independent of any particular source or target language. An *IR* may take one of several forms: an *in-memory data structure*, or a special *tuple- or stack-based code* readable by the program. In the latter case it is also called an *intermediate language*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Intermediate_representation)

Aspects of the *front end* include:
* ***Lexical analysis*** (also known as ***lexing*** or ***tokenization***) breaks the source code text into a sequence of small pieces called *lexical tokens*. This phase can be divided into two stages: the *scanning*, which segments the input text into syntactic units called *lexemes* and assigns them a category; and the *evaluating*, which converts *lexemes* into a processed value. A *token* is a pair consisting of a token name and an optional token value. Common token categories may include identifiers, keywords, separators, operators, literals and comments, although the set of token categories varies in different programming languages. The *lexeme* syntax is typically a *regular language*, so a finite-state automaton constructed from a *regular expression* can be used to recognize it. The software doing lexical analysis is called a *lexical analyzer*. This may not be a separate step - it can be combined with the parsing step in scannerless parsing, in which case parsing is done at the character level, not the token level.
* ***Syntax analysis*** (also known as ***parsing***) involves parsing the *token* sequence to identify the syntactic structure of the program. This phase typically builds a *parse tree*, which replaces the linear sequence of tokens with a tree structure built according to the rules of a *formal grammar* which define the language's syntax. The *parse tree* is often analyzed, augmented, and transformed by later phases in the compiler.
* ***Semantic analysis*** adds semantic information to the *parse tree* and builds the *symbol table*. This phase performs semantic checks such as *type checking* (checking for *type errors*), or *object binding* (associating variable and function references with their definitions), or *definite assignment* (requiring all local variables to be initialized before use), rejecting incorrect programs or issuing warnings. Semantic analysis usually requires a complete *parse tree*, meaning that this phase logically follows the parsing phase, and logically precedes the code generation phase, though it is often possible to fold multiple phases into one pass over the code in a compiler implementation.

-- [Wikipedia](https://en.wikipedia.org/wiki/Compiler#Front_end)

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

###### *Middle end*

The ***middle end***, also known as optimizer, performs optimizations on the intermediate representation in order to improve the performance and the quality of the produced machine code. The middle end contains those optimizations that are independent of the CPU architecture being targeted.

The main phases of the middle end include the following:
* ***Analysis***: This is the gathering of program information from the intermediate representation derived from the input; data-flow analysis is used to build use-define chains, together with *dependence analysis*, *alias analysis*, *pointer analysis*, *escape analysis*, etc. Accurate analysis is the basis for any compiler optimization. The *control-flow graph* of every compiled function and the *call graph* of the program are usually also built during the analysis phase.
* ***Optimization***: the intermediate language representation is transformed into functionally equivalent but faster (or smaller) forms. Popular optimizations are *inline expansion*, *dead-code elimination*, *constant propagation*, *loop transformation* and even *automatic parallelization*.

Compiler analysis is the prerequisite for any compiler optimization, and they tightly work together. For example, dependence analysis is crucial for loop transformation.

-- [Wikipedia](https://en.wikipedia.org/wiki/Compiler#Middle_end)

###### *Back end*

The ***back end*** is responsible for the CPU architecture specific optimizations and for code generation.

The main phases of the back end include the following:
* ***Machine dependent optimizations***: optimizations that depend on the details of the *CPU architecture* that the compiler targets. A prominent example is peephole optimizations, which rewrites short sequences of assembler instructions into more efficient instructions.
* ***Code generation***: the transformed intermediate language is translated into the output language, usually the native *machine language* of the system. This involves resource and storage decisions, such as deciding which variables to fit into registers and memory and the selection and scheduling of appropriate machine instructions along with their associated addressing modes (see also Sethi–Ullman algorithm). Debug data may also need to be generated to facilitate debugging.

-- [Wikipedia](https://en.wikipedia.org/wiki/Compiler#Back_end)

> **Machine code** is data encoded and structured to control a computer's *central processing unit* (*CPU*) via its programmable interface. A computer program consists primarily of sequences of machine-code instructions.
> Machine code is classified as *native* with respect to its host CPU since it is the language that the CPU interprets directly.
> A *software interpreter* is a virtual machine that processes *virtual* machine code.

-- [Wikipedia](https://en.wikipedia.org/wiki/Machine_code)

#### ✻ Is there a compliation in the PHP?

**Yes, PHP has a compilation process.** But it is not a traditional, fully compiled language like C++. Instead, PHP scripts undergo a multi-step execution process that involves compiling PHP *source code* into an *intermediate format* called *opcodes*. Since PHP 8.0, this process also includes a *Just-In-Time (JIT) compiler* to further improve performance.

#### Linking

Linking allows to consolidate the previously compiled code into single executable or reusable library.

> A ***linker*** or ***link editor*** is a computer program that combines intermediate software build files such as object and library files into a single *executable file* such as a *program* or *library*. A linker is often part of a toolchain that includes a *compiler* and/or *assembler* that generates *intermediate files* that the linker processes. The linker may be integrated with other toolchain tools such that the user does not interact with the linker directly.
>
> A simpler version that writes its output directly to memory is called the *loader*, though loading is typically considered a separate process.

-- [Wikipedia](https://en.wikipedia.org/wiki/Linker_(computing))

#### ✻ Is there a linking in the PHP?

**Yes, there are multiple forms of "linking" in PHP.** But it is not a traditional linker like in compiled languages such as C++. The process happens at runtime rather than at compile time. The forms of linking in PHP:
* *Runtime dynamic linking*: When the PHP engine runs a script, it performs a type of dynamic linking to use extensions.
* *Linking to external PHP files*: A common form of "linking" in PHP is to include other PHP files within the script. This is not the same as a compiler's linker but serves a similar purpose by making code from other files available. ￼
* *Linking the source code files*: Done by the `include`, `include_once`, `require` and `require_once` functions - used to bring code from another file into the current one.
* *Filesystem linking*: PHP can interact with the operating system to create and manage hard and symbolic links, just like command-line tools such as `ln`; done by functions: ￼
    * `link`: Creates a hard link to a file.
    * `symlink`: Creates a symbolic link to a file or directory.
    * `readlink`: Returns the target of a symbolic link.
* *Composer Linker* (for development): For managing dependencies, especially during local development, there is a *Composer* plugin called *Composer Linker* that mimics the functionality of *npm link*; It uses symbolic links to connect a local package's code directly into the vendor directory of another project, allowing for easier real-time testing and development.

### Creating an executable program in interpreted runtime environment

#### Intepreting

> In computing, an **interpreter** is software that executes *source code* without first *compiling* it to *machine code*. An interpreted runtime environment differs from one that processes *CPU-native executable code* which requires *translating* source code before *executing* it. An interpreter may translate the source code to an *intermediate format*, such as *bytecode*. A hybrid environment may translate the *bytecode* to *machine code* via *just-in-time compilation*, as in the case of .NET and Java, instead of interpreting the *bytecode* directly.
>
> Before the widespread adoption of interpreters, the execution of computer programs often relied on *compilers*, which translate and compile source code into *machine code*. Early runtime environments for Lisp and BASIC could parse source code directly. Thereafter, runtime environments were developed for languages (such as Perl, Raku, Python, MATLAB, and Ruby), which translated source code into an intermediate format before executing to enhance runtime performance.
>
> Code that runs in an interpreter can be run on any platform that has a compatible interpreter. The same code can be distributed to any such platform, instead of an executable having to be built for each platform. Although each programming language is usually associated with a particular runtime environment, a language can be used in different environments. Interpreters have been constructed for languages traditionally associated with compilation, such as ALGOL, Fortran, COBOL, C and C++.

-- [Wikipedia](https://en.wikipedia.org/wiki/Interpreter_(computing))

#### ✻ Is there an interpreting in the PHP?

**Yes, PHP has an interpreting process.** Its code is processed and executed by a PHP *interpreter* (like the *Zend Engine*) at runtime, rather than being compiled into machine code beforehand. This makes it flexible and easier to develop with, but newer versions of PHP use optimizations like *Just-In-Time (JIT) compilation* to improve performance, blurring the line between purely interpreted and compiled languages. ￼

When a PHP script is run, the interpreter goes through several stages: tokenizing the code, parsing it, compiling it into an intermediate format (like bytecode), and finally executing it.

Modern PHP versions include features like *OPcache* and *JIT compilation* to speed up execution by storing compiled bytecode or compiling frequently used parts of the code on the fly.

### Creating an executable program in JIT compiled runtime environment

#### JIT compilation

> In computing, **just-in-time (JIT) compilation** (also *dynamic translation* or *run-time compilations*) is compilation (of computer code) during execution of a program (at run time) rather than before execution. This may consist of *source code* translation but is more commonly *bytecode* translation to *machine code*, which is then executed directly. A system implementing a JIT compiler typically continuously analyses the code being executed and identifies parts of the code where the speedup gained from compilation or recompilation would outweigh the overhead of compiling that code.
>
> JIT compilation is a combination of the two traditional approaches to translation to machine code: *ahead-of-time compilation* (*AOT*), and *interpretation*, which combines some advantages and drawbacks of both. Roughly, JIT compilation combines the speed of compiled code with the flexibility of interpretation, with the overhead of an interpreter and the additional overhead of compiling and linking (not just interpreting). JIT compilation is a form of dynamic compilation, and allows adaptive optimization such as dynamic recompilation and microarchitecture-specific speedups. Interpretation and JIT compilation are particularly suited for dynamic programming languages, as the runtime system can handle late-bound data types and enforce security guarantees.

-- [Wikipedia](https://en.wikipedia.org/wiki/Just-in-time_compilation)

#### ✻ Is there an JIT compilation in the PHP?

**Yes, PHP has is a JIT compilation process.**

Pure interpreted programming languages has no compilation step, and directly executes the code in a virtual machine. Most of the interpreted languages including PHP, in fact, has a light-weight compilation step to improve its performance.

Programming languages with *Ahead-Of-Time (AOT) compilation*, on other hand requires the code to be compiled first before it runs.

*Just-In-Time compilation* is a hybrid model of *interpreter* and *Ahead-of-Time compilation*, that some or all of the code is compiled, often at run-time, without requiring the developer to manually compile it.

PHP was historically an *interpreted language*, that all of the code was interpreted by a *virtual machine* (*Zend VM*). This was changed with the introduction of *Opcache* and *Opcodes*, which were generated from the PHP code, and can be cached in memory. PHP 7.0 added the concept of *AST* (*Abstract Syntax Tree*), that further separated the parser from the compiler.

PHP's JIT internally uses *DynASM* from LuaJIT, and as implemented as part of the *Opcache*.

-- [PHP Watch](https://php.watch/versions/8.0/JIT)

#### ✻ Is PHP compiled or interpreted language?

**Both.**

Basically, PHP is interpreted but PHP is compiled down to an intermediate *bytecode* that is then interpreted by the runtime *Zend engine*.

-- [Tutorialspoint](https://www.tutorialspoint.com/is-php-compiled-or-interpreted)

PHP is an interpreted language. The *Zend Engine* that is bundled with the PHP distribution is a scripting engine that interprets PHP scripts as a user has developed them. The *Zend Engine* internally compiles the PHP scripts into Zend *opcodes* or instruction machine code. The Zend Engine is also the runtime engine, and it runs the compiled code. Compiling PHP scripts is transparent to the user, and the user does not directly perform any compilation.

-- [Techwell](https://www.techwell.com/techwell-insights/2020/07/comparing-php-and-java)

Both. PHP is compiled down to an intermediate bytecode that is then interpreted by the runtime engine.
The PHP compiler's job is to parse your PHP code and convert it into a form suitable for the runtime engine. Among its tasks:
* Ignore comments
* Resolve variables, function names, and so forth and create the symbol table
* Construct the abstract syntax tree of your program
* Write the bytecode

Depending on your PHP setup, this step is typically done just once, the first time the script is called. The compiler output is cached to speed up access on subsequent uses. If the script is modified, however, the compilation step is done again.
The runtime engine walks the AST and bytecode when the script is called. The symbol table is used to store the values of variables and provide the bytecode addresses for functions.
This process of compiling to bytecode and interpreting it at runtime is typical for languages that run on some kind of virtual runtime machine including Perl, Java, Ruby, Smalltalk, and others.

-- [Stackoverflow](https://stackoverflow.com/questions/1514676/is-php-compiled-or-interpreted)

## Clients & servers

> The **client–server model** is a distributed application structure that partitions tasks or workloads between the providers of a resource or service, called ***servers***, and service requesters, called ***clients***. Often clients and servers communicate over a *computer network* on separate hardware, but both client and server may be on the same device. A server host runs one or more server programs, which share their resources with clients. A client usually does not share its computing resources, but it requests content or service from a server and may share its own content as part of the request. Clients, therefore, initiate communication sessions with servers, which await incoming requests. Examples of computer applications that use the client–server model are email, network printing, and the *World Wide Web*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Client–server_model)

> A **client** is a computer that gets information from another computer called *server* in the context of *client–server model* of *computer networks*. The server is often (but not always) on another computer system, in which case the client accesses the service by way of a network.
>
> A client is a program that, as part of its operation, relies on sending a request to another program or a computer hardware or software that accesses a service made available by a server (which may or may not be located on another computer). For example, web browsers are clients that connect to web servers and retrieve web pages for display. Email clients retrieve email from mail servers.

-- [Wikipedia](https://en.wikipedia.org/wiki/Client_(computing))

> A **server** is a computer that provides information to other computers called *clients* on a *computer network*. This architecture is called the *client–server model*. Servers can provide various functionalities, often called *services*, such as sharing data or resources among multiple clients or performing computations for a client. A single server can serve multiple clients, and a single client can use multiple servers. A client process may run on the same device or may connect over a network to a server on a different device. Typical servers are *database servers*, *file servers*, *mail servers*, *print servers*, *web servers*, *game servers*, and *application servers*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Server_(computing))

#### ✻ Is PHP server-side or client-side language?

**PHP is server-side**, whereas other programming languages like JavaScript are client-side. The major difference between the two is that PHP code is executed on the server that generates HTML, and is sent directly to the client. While the client can see the results by running the script, they cannot access the underlying code.

-- https://hackr.io/blog/what-is-php

[▵ Up](#php-features)
[⌂ Home](../../README.md)
[▲ Previous: PHP history](php_history.md)
