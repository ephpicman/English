<?php

/**
 * Grammar schema
 *
 * Purpose
 * This schema defines one grammar topic record. Explain form, meaning, and use accurately, and keep reusable grammar patterns distinct from explanatory prose and exercises.
 *
 * Shared conventions
 * - This file defines the required structure and field-level guidance for one
 *   record of its specific content type; it is a schema/template, not a completed entry.
 * - Treat the keys, nesting, and data types defined below as authoritative.
 *   Do not add, remove, rename, or repurpose fields in individual records
 *   without deliberately revising the schema and dependent tooling.
 * - Use UTF-8 text, British English, and accurate, natural language suitable
 *   for the record's purpose, intended audience, and stated CEFR level.
 * - Use strings for single text values and arrays of strings for ordered lists
 *   of text, as specified by each field. Preserve sequence wherever order matters.
 * - Follow each field's documented requirements and controlled values. Keep
 *   editorial metadata separate from learner-facing content.
 * - Replace illustrative placeholders with actual data in completed entries.
 *   Do not treat sample values in this schema as finished content.
 *
 * This file is part of the ephpicman/LearningEnglish project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical name of the grammar topic, consistent with the project's grammar collection.
     * Keep identifiers unique within the relevant content collection.
     */
    'ID' => '[canonical identifier]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the category of record. The value must be exactly
     * "grammar", matching this schema's entry type.
     */
    'type' => 'grammar',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level targeted by this record: A1, A2, B1, B2, C1, or C2.
     * Store exactly one level, not a range or a list. Assign it according to
     * the language and comprehension demands of the complete record.
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
     * An ordered list of reusable grammatical patterns or formulae showing how
     * the target structure is formed. Each item should normally express one
     * clearly identifiable pattern, using concise and consistent notation.
     * Keep patterns structural rather than explanatory: put rules, meanings,
     * usage conditions, and detailed qualifications in explanation. Define any
     * symbols or abbreviations in explanation, and represent materially
     * different structures as separate items. Include only patterns relevant
     * to the grammar point being taught.
     */
    'grammar_patterns' => [],

    /**
     * examples
     * --------
     * Type: array of strings
     * Required: yes
     *
     * An ordered list of natural, complete example sentences that clearly
     * demonstrate the target grammar point. Each item should normally contain
     * one sentence. Use varied contexts when they clarify differences in form,
     * meaning, or use; do not add variation merely for its own sake. Include a
     * short multi-sentence context only when it is necessary to demonstrate the
     * structure accurately, and ensure the target feature is identifiable.
     * Examples must be grammatically accurate and natural in British English.
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
    | Editorial metadata maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | The meta section contains organisational metadata and manually curated
    | relationships. Keep it separate from learner-facing content. Automated
    | processes must not silently overwrite editorial decisions.
    */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal notes for the human editor, including sources to verify,
         * consistency issues, and decisions to revisit. These notes are not
         * learner-facing content. Remove temporary notes once they are resolved.
         */
        'editorial_notes' => [],

        /**
         * tags
         * ----
         * Type: array of strings
         *
         * Concise, consistent labels used to organise, filter, and retrieve the
         * entry. Avoid duplicate or near-duplicate tags that differ only in
         * spelling or capitalisation.
         */
        'tags' => [],

        /**
         * related
         * -------
         * Type: associative array with fixed relationship categories.
         * Each value is an array of strings containing canonical identifiers
         * or names, according to the repository's linking convention.
         *
         * Include only meaningful relationships selected or confirmed by a
         * human editor. Do not treat unreviewed automatic suggestions as
         * curated links. Do not add categories or duplicate relationships.
         */
        'related' => [
            /**
             * words
             * -----
             * Related single-word entries that have a meaningful lexical,
             * semantic, or usage relationship to this entry.
             */
            'words' => [],

            /**
             * grammars
             * --------
             * Grammar topics relevant to understanding or using this entry.
             */
            'grammars' => [],

            /**
             * idioms
             * ------
             * Idiom entries with a meaningful semantic, lexical, or usage
             * relationship to this entry.
             */
            'idioms' => [],

            /**
             * phrasal_verbs
             * -------------
             * Phrasal-verb entries with a meaningful semantic, lexical, or
             * usage relationship to this entry.
             */
            'phrasal_verbs' => [],

            /**
             * collocations
             * ------------
             * Collocation entries with a meaningful lexical, semantic, or
             * usage relationship to this entry.
             */
            'collocations' => [],
        ],
    ],
];
