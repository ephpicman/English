<?php

/**
 * Grammar schema
 *
 * Documents the fixed structure of one grammar topic record. This file is a
 * schema/template, not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - Keep the content accurate, natural, and appropriate to its intended genre
 *   and CEFR level.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical identifier for this record. Use the canonical name of the grammar topic, consistent with the project's grammar collection.
     * Keep identifiers unique within the relevant content collection and do
     * not use an incidental sentence from the body as the identifier.
     */
    'ID' => '[canonical identifier]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the record category. For this schema, the value must be
     * exactly "grammar".
     */
    'type' => 'grammar',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level targeted by this record: A1, A2, B1, B2, C1, or C2.
     * Store one level, not a range. Assign it based on the language and
     * comprehension demands of the complete record.
     */
    'language_level' => 'B1',

    /**
     * title
     * -----
     * Type: string
     * Required: yes
     *
     * The learner-facing name of the grammar topic. Keep it concise and consistent with the project's grammar naming conventions.
     */
    'title' => '',

    /**
     * explanation
     * -----------
     * Type: array of strings
     * Required: yes
     *
     * A clear, accurate explanation of the grammar point, including form,
     * meaning, and use where relevant. Put each logical paragraph in a separate
     * string, in reading order. Do not include empty strings merely to create
     * spacing, or put exercise instructions or question sets here.
     */
    'explanation' => [],

    /**
     * grammar_patterns
     * ----------------
     * Type: array of strings
     * Required: yes
     *
     * Reusable grammatical patterns or formulae that describe how the structure is formed. Use concise notation and explain any notation in the explanation field.
     */
    'grammar_patterns' => [],

    /**
     * examples
     * --------
     * Type: array of strings
     * Required: yes
     *
     * Natural, complete example sentences illustrating the grammar point. Include varied contexts where useful and ensure every example actually demonstrates the target structure.
     */
    'examples' => [],

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Learner-facing notes on restrictions, common errors, contrasts, exceptions, or British English usage. Do not turn this field into a set of exercises or questions.
     */
    'educational_notes' => [],

    /*
    |--------------------------------------------------------------------------
    | Exclusively maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | Metadata organises the record and its manually curated relationships.
    | Keep editorial workflow notes separate from learner-facing content.
    */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal editorial notes for the human editor, such as source checks,
         * consistency decisions, or issues to revisit. Do not put learner-facing
         * explanations here.
         */
        'editorial_notes' => [],

        /**
         * tags
         * ----
         * Type: array of strings
         *
         * Concise, consistent labels for filtering and organisation. Avoid
         * near-duplicate tags that differ only in spelling or capitalisation.
         */
        'tags' => [],

        /**
         * related
         * -------
         * Type: associative array with the fixed relationship categories below.
         * Each value is an array of strings containing canonical identifiers.
         *
         * Record only meaningful relationships that have been checked by an
         * editor. Do not add categories or use this field for incidental mentions.
         */
        'related' => [
            'words' => [],
            'grammars' => [],
            'idioms' => [],
            'phrasal_verbs' => [],
            'collocations' => [],
        ],
    ],
];
