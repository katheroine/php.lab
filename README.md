# PHP.lab

Laboratory of PHP.

## Index

1. [Literals, constants, variables](./literals_constants_variables/)
    1. [Literals](./literals_constants_variables/literals.php)
    2. [Constants](./literals_constants_variables/constants.php)
    3. [Variables](./literals_constants_variables/variables.php)
    4. [Static variables](./literals_constants_variables/static_variables.php)
2. [Operators](./operators/)
    1. [Spaceship operator](./operators/spaceship_operator.php)
    2. [Ternary operator](./operators/spaceship_operator.php)
    3. [Null coalescing operator](./operators/null_coalescing_operator.php)
    4. [Null coalescing assignment operator](./operators/null_coalescing_assignment_operator.php)
    5. [Nullsafe operator](./operators/nullsafe_operator.php)
3. [Functions](./functions/)
    1. [Functions](./functions/functions.php)
    2. [Passing arguments](./functions/passing_arguments.php)
    3. [Lambdas](./functions/lambdas.php)
    4. [Cloasures](./functions/closures.php)
    5. [Generators](./functions/generators.php)
    6. [Higher order functions](./functions/higher_order_functions.php)
4. [Classes, interfaces, traits](./classes_interfaces_traits/)
    1. [Classes](./classes_interfaces_traits/classes/)
        1. [Classes](./classes_interfaces_traits/classes/classes.php)
        2. [Inheriting classes](./classes_interfaces_traits/classes/inheritance.php)
        3. [Encapsulation](./classes_interfaces_traits/classes/encapsulation.php)
        4. [Class component names](./classes_interfaces_traits/classes/class_component_names.php)
        5. [Static properties and methods](./classes_interfaces_traits/classes/static.php)
        6. [Readonly](./classes_interfaces_traits/classes/readonly.php)
        7. [Abstract methods and classes](./classes_interfaces_traits/classes/abstract.php)
        8. [Final constants, methods and classes](./classes_interfaces_traits/classes/final.php)
        9. [Construction ways](./classes_interfaces_traits/classes/construction_ways.php)
        10. [Construction with static, self and parent](./classes_interfaces_traits/classes/static_self_parent_construction.php)
        11. [Construction object from array](./classes_interfaces_traits/classes/construction_object_from_array.php)
        12. [Cloning objects](./classes_interfaces_traits/classes/cloning.php)
        13. [Signature compatibility in overriding](./classes_interfaces_traits/classes/overriding_signature_compatibility.php)
        14. [Class name resolution](./classes_interfaces_traits/classes/class_name_resolution.php)
        15. [Magic methods](./classes_interfaces_traits/classes/magic_methods/)
            1. [__set](./classes_interfaces_traits/classes/magic_methods/__set.php)
            2. [__get](./classes_interfaces_traits/classes/magic_methods/__get.php)
            3. [__call](./classes_interfaces_traits/classes/magic_methods/__call.php)
            4. [__callStatic](./classes_interfaces_traits/classes/magic_methods/__callStatic.php)
            5. [__invoke](./classes_interfaces_traits/classes/magic_methods/__invoke.php)
            6. [__isset](./classes_interfaces_traits/classes/magic_methods/__isset.php)
            7. [__unset](./classes_interfaces_traits/classes/magic_methods/__unset.php)
            8. [__sleep](./classes_interfaces_traits/classes/magic_methods/__sleep.php)
            9. [__wakeup](./classes_interfaces_traits/classes/magic_methods/__wakeup.php)
            10. [__serialize](./classes_interfaces_traits/classes/magic_methods/__serialize.php)
            11. [__unserialize](./classes_interfaces_traits/classes/magic_methods/__unserialize.php)
            12. [__toString](./classes_interfaces_traits/classes/magic_methods/__toString.php)
            13. [__debugInfo](./classes_interfaces_traits/classes/magic_methods/__debugInfo.php)
            14. [__construct](./classes_interfaces_traits/classes/magic_methods/__construct.php)
            14. [__destruct](./classes_interfaces_traits/classes/magic_methods/__destruct.php)
        16. [Constructor overriding](./classes_interfaces_traits/classes/constructor_overriding.php)
        17. [Constructor promotion](./classes_interfaces_traits/classes/constructor_promotion.php)
    2. [Interfaces](./classes_interfaces_traits/interfaces/)
        1. [Interfaces](./classes_interfaces_traits/interfaces/interfaces.php)
        2. [Extending interfaces](./classes_interfaces_traits/interfaces/extending.php)
    3. [Traits](./classes_interfaces_traits/traits/)
        1. [Traits](./classes_interfaces_traits/traits/traits.php)
        2. [Precedence](./classes_interfaces_traits/traits/precedence.php)
        3. [Conflicts resolution](./classes_interfaces_traits/traits/conflicts_resolution.php)
        4. [Methods visibility change](./classes_interfaces_traits/traits/visibility_change.php)
        5. [Abstract methods](./classes_interfaces_traits/traits/visibility_change.php)
        6. [Composing traits](./classes_interfaces_traits/traits/composing.php)
7. [Errors and exceptions](./errors_and_exceptions/)
    1. [Errors](./errors_and_exceptions/errors/)
        1. [Triggering and handling errors](./errors_and_exceptions/errors/triggering_and_handling_errors.php)
        2. [Catching errors](./errors_and_exceptions/errors/catching_errors.php)
    2. [Exceptions](./errors_and_exceptions/exceptions/)
        1. [Exceptions](./errors_and_exceptions/exceptions/exceptions.php)
        2. [Returning value inside try-catch-finally](./errors_and_exceptions/exceptions/return.php)
8. [Reflections](./reflections/)
    1. [Function reflections](./reflections/functions.php)
    3. [Enum reflections](./reflections/enums.php)
    2. [Class reflections](./reflections/classes.php)
    3. [Class constant reflections](./reflections/class_constants.php)
    4. [Property reflections](./reflections/properties.php)
    5. [Method reflections](./reflections/methods.php)
9. [Attributes](./attributes/attributes.php)
10. [Library](./library/)
    1. [Classes](./library/classes/)
        1. [Language constructs](./library/classes/constructs/)
            1. [Closure](./library/classes/constructs/closure.php)
            2. [Generator](./library/classes/constructs/generator.php)
            3. [Array object (SPL)](./library/classes/constructs/spl_array_object.php)
            4. [Standard class](./library/classes/constructs/std_class.php)
            5. [Weak reference](./library/classes/constructs/weak_reference.php)
            6. [Sensitive parameter value](./library/classes/constructs/sensitive_parameter_value.php)
        2. [Data structures](./library/classes/data_structures/)
            1. [Doubly linked list (SPL)](./library/classes/data_structures/spl_doubly_linked_list.php)
            2. [Stack (SPL)](./library/classes/data_structures/spl_stack.php)
            3. [Queue (SPL)](./library/classes/data_structures/spl_queue.php)
            4. [Priority queue (SPL)](./library/classes/data_structures/spl_priority_queue.php)
            5. [Max heap (SPL)](./library/classes/data_structures/spl_max_heap.php)
            6. [Min heap (SPL)](./library/classes/data_structures/spl_min_heap.php)
            7. [Fixed array (SPL)](./library/classes/data_structures/spl_fixed_array.php)
            8. [Object storage (SPL)](./library/classes/data_structures/spl_object_storage.php)
            9. [Weak map](./library/classes/data_structures/weak_map.php)
        3. [Iterators](./library/classes/iterators/)
            1. [Array iterator (SPL)](./library/classes/iterators/spl_array_iterator.php)
            2. [Recursive array iterator (SPL)](./library/classes/iterators/spl_recursive_array_iterator.php)
            3. [Iterator iterator (SPL)](./library/classes/iterators/spl_iterator_iterator.php)
            4. [Recursive iterator iterator (SPL)](./library/classes/iterators/spl_recursive_iterator_iterator.php)
            5. [Append iterator (SPL)](./library/classes/iterators/spl_append_iterator.php)
            6. [Empty iterator (SPL)](./library/classes/iterators/spl_empty_iterator.php)
            7. [Limit iterator (SPL)](./library/classes/iterators/spl_limit_iterator.php)
            8. [No rewind iterator (SPL)](./library/classes/iterators/spl_no_rewind_iterator.php)
            9. [Infinite iterator (SPL)](./library/classes/iterators/spl_infinite_iterator.php)
            10. [Multiple iterator (SPL)](./library/classes/iterators/spl_multiple_iterator.php)
            11. [Callback filter iterator (SPL)](./library/classes/iterators/spl_callback_filter_iterator.php)
            12. [Recursive callback filter iterator (SPL)](./library/classes/iterators/spl_recursive_callback_filter_iterator.php)
            13. [Caching iterator (SPL)](./library/classes/iterators/spl_caching_iterator.php)
            14. [Recursive caching iterator (SPL)](./library/classes/iterators/spl_recursive_caching_iterator.php)
            15. [Regex iterator (SPL)](./library/classes/iterators/spl_regex_iterator.php)
            16. [Recursive regex iterator (SPL)](./library/classes/iterators/spl_recursive_regex_iterator.php)
            17. [Filesystem iterator (SPL)](./library/classes/iterators/spl_filesystem_iterator.php)
            18. [Directory iterator (SPL)](./library/classes/iterators/spl_directory_iterator.php)
            19. [Recursive directory iterator (SPL)](./library/classes/iterators/spl_recursive_directory_iterator.php)
            20. [Glob iterator (SPL)](./library/classes/iterators/spl_glob_iterator.php)
            21. [Recursive tree iterator (SPL)](./library/classes/iterators/spl_recursive_tree_iterator.php)
            22. [Parent iterator](./library/classes/iterators/spl_parent_iterator.php)
        4. [Exceptions](./library/classes/exceptions/)
            1. [Exception](./library/classes/exceptions/exception.php)
            1. [Error](./library/classes/exceptions/error.php)
            1. [Error exception](./library/classes/exceptions/error_exception.php)
            1. [Type error](./library/classes/exceptions/type_error.php)
            1. [Value error](./library/classes/exceptions/value_error.php)
            1. [Argument count error](./library/classes/exceptions/argument_count_error.php)
            1. [Arithmetic error](./library/classes/exceptions/arithmetic_error.php)
            1. [Division by zero error](./library/classes/exceptions/division_by_zero_error.php)
            1. [Closed generator exception](./library/classes/exceptions/closed_generator_exception.php)
            1. [Unexpected value exception (SPL)](./library/classes/exceptions/spl_unexpected_value_exception.php)
            2. [Bad function call exception (SPL)](./library/classes/exceptions/spl_bad_function_call_exception.php)
            3. [Bad method call exception (SPL)](./library/classes/exceptions/spl_bad_method_call_exception.php)
            4. [Invalid arument exception (SPL)](./library/classes/exceptions/spl_invalid_argument_exception.php)
            5. [Logic exception (SPL)](./library/classes/exceptions/spl_logic_exception.php)
            6. [Length exception (SPL)](./library/classes/exceptions/spl_length_exception.php)
            7. [Out of range exception (SPL)](./library/classes/exceptions/spl_out_of_range_exception.php)
            8. [Domain exception (SPL)](./library/classes/exceptions/spl_domain_exception.php)
            9. [Runtime exception (SPL)](./library/classes/exceptions/spl_runtime_exception.php)
            10. [Range exception (SPL)](./library/classes/exceptions/spl_range_exception.php)
            11. [Out of bounds exception (SPL)](./library/classes/exceptions/spl_out_of_bounds_exception.php)
            12. [Overflow exception (SPL)](./library/classes/exceptions/spl_overflow_exception.php)
            13. [Underflow exception (SPL)](./library/classes/exceptions/spl_underflow_exception.php)
        5. [Files](./library/classes/files/)
            1. [File info (SPL)](./library/classes/files/spl_file_info.php)
            2. [File object (SPL)](./library/classes/files/spl_file_object.php)
    2. [Interfaces](./library/interfaces/)
        1. [Data](./library/interfaces/data/)
            1. [Stringable](./library/interfaces/data/stringable.php)
            2. [Serializable](./library/interfaces/data/serializable.php)
        2. [Collections](./library/interfaces/collections/)
            1. [Array access](./library/interfaces/collections/array_access.php)
            2. [Countable (SPL)](./library/interfaces/collections/spl_countable.php)
            3. [Traversable](./library/interfaces/collections/iterators/traversable.php)
            4. [Iterator](./library/interfaces/collections/iterators/iterator.php)
            5. [Iterator aggregate](./library/interfaces/collections/iterators/iterator_aggregate.php)
        3. [Exceptions](./library/interfaces/exceptions/)
            1. [Throwable](./library/interfaces/exceptions/throwable.php)
