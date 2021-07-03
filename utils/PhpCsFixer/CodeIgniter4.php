<?php

declare(strict_types=1);

namespace Utils\PhpCsFixer;

use Nexus\CsConfig\Ruleset\AbstractRuleset;

/**
 * Defines the ruleset used for the CodeIgniter4 organization.
 *
 * @internal
 */
final class CodeIgniter4 extends AbstractRuleset
{
    public function __construct()
    {
        $this->name = 'CodeIgniter4 Revised Coding Standards';

        $this->rules = [
            'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
            'array_indentation'       => true,
            'array_push'              => true, // risky
            'array_syntax'            => ['syntax' => 'short'],
            'backtick_to_shell_exec'  => true,
            'binary_operator_spaces'  => [
                'default'   => 'single_space',
                'operators' => [
                    '='  => 'align_single_space_minimal',
                    '=>' => 'align_single_space_minimal',
                    '||' => 'align_single_space_minimal',
                    '.=' => 'align_single_space_minimal',
                ],
            ],
            'blank_line_after_namespace'   => true,
            'blank_line_after_opening_tag' => true,
            'blank_line_before_statement'  => [
                'statements' => [
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],
            'braces' => [
                'allow_single_line_anonymous_class_with_empty_body' => true,
                'allow_single_line_closure'                         => true,
                'position_after_anonymous_constructs'               => 'same',
                'position_after_control_structures'                 => 'same',
                'position_after_functions_and_oop_constructs'       => 'next',
            ],
            'cast_spaces'                 => ['space' => 'single'],
            'class_attributes_separation' => [
                'elements' => [
                    // 'const' => 'one_if_phpdoc', // @todo Enable in php-cs-fixer v3.1
                    // 'property' => 'one_if_phpdoc', // @todo Enable in php-cs-fixer v3.1
                    'method' => 'one',
                ],
            ],
            'class_definition' => [
                'multi_line_extends_each_single_line' => true,
                'single_item_single_line'             => true,
                'single_line'                         => true,
            ],
            'class_keyword_remove'       => false,
            'clean_namespace'            => true,
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'combine_nested_dirname'     => true,
            'comment_to_phpdoc'          => [
                'ignored_tags' => [
                    'todo',
                    'codeCoverageIgnore',
                    'codeCoverageIgnoreStart',
                    'codeCoverageIgnoreEnd',
                    'phpstan-ignore-line',
                    'phpstan-ignore-next-line',
                ],
            ],
            'compact_nullable_typehint'            => true,
            'concat_space'                         => ['spacing' => 'one'],
            'constant_case'                        => ['case' => 'lower'],
            'date_time_immutable'                  => false,
            'declare_equal_normalize'              => ['space' => 'none'],
            'declare_strict_types'                 => false,
            'dir_constant'                         => true,
            'doctrine_annotation_array_assignment' => false,
            'doctrine_annotation_braces'           => false,
            'doctrine_annotation_indentation'      => false,
            'doctrine_annotation_spaces'           => false,
            'echo_tag_syntax'                      => [
                'format'                         => 'short',
                'long_function'                  => 'echo',
                'shorten_simple_statements_only' => false,
            ],
            'elseif'            => true,
            'encoding'          => true,
            'ereg_to_preg'      => true,
            'error_suppression' => [
                'mute_deprecation_error'         => true,
                'noise_remaining_usages'         => false,
                'noise_remaining_usages_exclude' => [],
            ],
            'explicit_indirect_variable' => true,
            'explicit_string_variable'   => true,
            'final_class'                => false,
            'final_internal_class'       => [
                'annotation_exclude'                         => ['@no-final'],
                'annotation_include'                         => ['@internal'],
                'consider_absent_docblock_as_internal_class' => false,
            ],
            'function_to_constant'        => true,
            'heredoc_indentation'         => ['indentation' => 'start_plus_one'],
            'heredoc_to_nowdoc'           => true,
            'increment_style'             => ['style' => 'post'],
            'indentation_type'            => true,
            'lambda_not_used_import'      => true,
            'line_ending'                 => true,
            'linebreak_after_opening_tag' => true,
            'list_syntax'                 => ['syntax' => 'short'],
            'logical_operators'           => true,
            'lowercase_cast'              => true,
            'lowercase_keywords'          => true,
            'lowercase_static_reference'  => true,
            'magic_constant_casing'       => true,
            'magic_method_casing'         => true,
            'mb_str_functions'            => false,
            'method_argument_space'       => [
                'after_heredoc'                    => false,
                'keep_multiple_spaces_after_comma' => false,
                'on_multiline'                     => 'ensure_fully_multiline',
            ],
            'method_chaining_indentation'             => true,
            'modernize_types_casting'                 => true,
            'multiline_comment_opening_closing'       => true,
            'multiline_whitespace_before_semicolons'  => ['strategy' => 'no_multi_line'],
            'native_function_casing'                  => true,
            'native_function_type_declaration_casing' => true,
            'new_with_braces'                         => true,
            'no_alias_functions'                      => ['sets' => ['@all']],
            'no_alias_language_construct_call'        => true,
            'no_short_bool_cast'                      => true,
            'no_trailing_comma_in_singleline_array'   => true,
            'no_unset_cast'                           => true,
            'no_whitespace_before_comma_in_array'     => ['after_heredoc' => true],
            'not_operator_with_space'                 => false,
            'not_operator_with_successor_space'       => true,
            'normalize_index_brace'                   => true,
            'ordered_imports'                         => ['sort_algorithm' => 'alpha'],
            'php_unit_construct'                      => [
                'assertions' => [
                    'assertSame',
                    'assertEquals',
                    'assertNotEquals',
                    'assertNotSame',
                ],
            ],
            'php_unit_dedicate_assert'               => ['target' => 'newest'],
            'php_unit_dedicate_assert_internal_type' => ['target' => 'newest'],
            'php_unit_expectation'                   => ['target' => 'newest'],
            'php_unit_fqcn_annotation'               => true,
            'php_unit_internal_class'                => ['types' => ['normal', 'final']],
            'php_unit_method_casing'                 => ['case' => 'camel_case'],
            'php_unit_mock'                          => ['target' => 'newest'],
            'php_unit_mock_short_will_return'        => true,
            'php_unit_namespaced'                    => true,
            'php_unit_no_expectation_annotation'     => [
                'target'          => 'newest',
                'use_class_const' => true,
            ],
            'php_unit_set_up_tear_down_visibility' => true,
            'php_unit_size_class'                  => false,
            'php_unit_strict'                      => [
                'assertions' => [
                    'assertAttributeEquals',
                    'assertAttributeNotEquals',
                    'assertEquals',
                    'assertNotEquals',
                ],
            ],
            'php_unit_test_annotation'               => ['style' => 'prefix'],
            'php_unit_test_case_static_method_calls' => [
                'call_type' => 'this',
                'methods'   => [],
            ],
            'php_unit_test_class_requires_covers' => false,
            'phpdoc_align'                        => true,
            'phpdoc_indent'                       => true,
            'phpdoc_inline_tag_normalizer'        => [
                'tags' => [
                    'example',
                    'id',
                    'internal',
                    'inheritdoc',
                    'inheritdocs',
                    'link',
                    'source',
                    'toc',
                    'tutorial',
                ],
            ],
            'phpdoc_line_span' => [
                'const'    => 'multi',
                'method'   => 'multi',
                'property' => 'multi',
            ],
            'phpdoc_no_access'    => true,
            'phpdoc_no_alias_tag' => [
                'replacements' => [
                    'property-read'  => 'property',
                    'property-write' => 'property',
                    'type'           => 'var',
                    'link'           => 'see',
                ],
            ],
            'phpdoc_no_empty_return'       => false,
            'phpdoc_no_package'            => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_order'                 => true,
            'phpdoc_order_by_value'        => [
                'annotations' => [
                    'author',
                    'covers',
                    'coversNothing',
                    'dataProvider',
                    'depends',
                    'group',
                    'internal',
                    'method',
                    'property',
                    'property-read',
                    'property-write',
                    'requires',
                    'throws',
                    'uses',
                ],
            ],
            'phpdoc_scalar' => [
                'types' => [
                    'boolean',
                    'callback',
                    'double',
                    'integer',
                    'real',
                    'str',
                ],
            ],
            'phpdoc_separation'                             => true,
            'phpdoc_trim'                                   => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types'                                  => ['groups' => ['simple', 'alias', 'meta']],
            'phpdoc_types_order'                            => [
                'null_adjustment' => 'always_last',
                'sort_algorithm'  => 'alpha',
            ],
            'phpdoc_var_annotation_correct_order' => true,
            'phpdoc_var_without_name'             => true,
            'pow_to_exponentiation'               => true,
            'protected_to_private'                => true,
            'psr_autoloading'                     => ['dir' => null],
            'set_type_to_cast'                    => true,
            'short_scalar_cast'                   => true,
            'simple_to_complex_string_variable'   => true,
            'standardize_increment'               => true,
            'static_lambda'                       => true,
            'switch_case_semicolon_to_colon'      => true,
            'switch_case_space'                   => true,
            'switch_continue_to_break'            => true,
            'ternary_operator_spaces'             => true,
            'ternary_to_elvis_operator'           => true,
            'ternary_to_null_coalescing'          => true,
            'trailing_comma_in_multiline'         => [
                'after_heredoc' => true,
                'elements'      => ['arrays'],
            ],
            'trim_array_spaces'               => true,
            'whitespace_after_comma_in_array' => true,
            'unary_operator_spaces'           => true,
            'visibility_required'             => ['elements' => ['const', 'method', 'property']],
            'yoda_style'                      => [
                'equal'                => false,
                'identical'            => null,
                'less_and_greater'     => false,
                'always_move_variable' => false,
            ],
        ];

        $this->requiredPHPVersion = 70300;

        $this->autoActivateIsRiskyAllowed = true;
    }
}
