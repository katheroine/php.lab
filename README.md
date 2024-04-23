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
10. [Standard PHP Library (SPL)](./spl/)
    1. [Data structures](./spl/data_structures/)
        1. [Doubly linked list](./spl/data_structures/doubly_linked_list.php)
        2. [Stack](./spl/data_structures/stack.php)
        3. [Queue](./spl/data_structures/queue.php)
        4. [Priority queue](./spl/data_structures/priority_queue.php)
        5. [Max heap](./spl/data_structures/max_heap.php)
        6. [Min heap](./spl/data_structures/min_heap.php)
        7. [Fixed array](./spl/data_structures/fixed_array.php)
        8. [Object storage](./spl/data_structures/object_storage.php)
    2. [Iterators](./spl/iterators/)
        1. [Array iterator](./spl/iterators/array_iterator.php)
        2. [Recursive array iterator](./spl/iterators/recursive_array_iterator.php)
        3. [Iterator iterator](./spl/iterators/iterator_iterator.php)
        4. [Recursive iterator iterator](./spl/iterators/recursive_iterator_iterator.php)
        5. [Append iterator](./spl/iterators/append_iterator.php)
        6. [Empty iterator](./spl/iterators/empty_iterator.php)
        7. [Limit iterator](./spl/iterators/limit_iterator.php)
        8. [No rewind iterator](./spl/iterators/no_rewind_iterator.php)
        9. [Infinite iterator](./spl/iterators/infinite_iterator.php)
        10. [Multiple iterator](./spl/iterators/multiple_iterator.php)
        11. [Callback filter iterator](./spl/iterators/callback_filter_iterator.php)
        12. [Recursive callback filter iterator](./spl/iterators/recursive_callback_filter_iterator.php)
        13. [Caching iterator](./spl/iterators/caching_iterator.php)
        14. [Recursive caching iterator](./spl/iterators/recursive_caching_iterator.php)
        15. [Regex iterator](./spl/iterators/regex_iterator.php)
        16. [Recursive regex iterator](./spl/iterators/recursive_regex_iterator.php)
        17. [Filesystem iterator](./spl/iterators/filesystem_iterator.php)
        18. [Directory iterator](./spl/iterators/directory_iterator.php)
        19. [Recursive directory iterator](./spl/iterators/recursive_directory_iterator.php)
        20. [Glob iterator](./spl/iterators/glob_iterator.php)
        21. [Recursive tree iterator](./spl/iterators/recursive_tree_iterator.php)
        22. [Parent iterator](./spl/iterators/parent_iterator.php)
    3. [Exceptions](./spl/exceptions/)
        1. [Unexpected value exception](./spl/exceptions/unexpected_value_exception.php)
        2. [Bad function call exception](./spl/exceptions/bad_function_call_exception.php)
        3. [Bad method call exception](./spl/exceptions/bad_method_call_exception.php)
        4. [Invalid arument exception](./spl/exceptions/invalid_argument_exception.php)
        5. [Logic exception](./spl/exceptions/logic_exception.php)
        6. [Length exception](./spl/exceptions/length_exception.php)
        7. [Out of range exception](./spl/exceptions/out_of_range_exception.php)
        8. [Domain exception](./spl/exceptions/domain_exception.php)
        9. [Runtime exception](./spl/exceptions/runtime_exception.php)
        10. [Range exception](./spl/exceptions/range_exception.php)
