<?php

/**
 * Collocation-entry schema
 *
 * Documents the structure of one collocation record. This is a schema/template,
 * not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - A collocation is a conventional or strongly preferred combination of words.
 *   It is more specific than a phrase that is merely grammatically possible.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical wording of the collocation. Use consistent base forms for variable elements where appropriate.
     * Keep identifiers unique within the relevant content collection.
     */
    'ID' => '[canonical form of the collocation]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the category of record. The value must be exactly
     * "collocation", matching this schema's entry type.
     */
    'type' => 'collocation',

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
     * pronunciation
     * -------------
     * Type: string
     * Required: yes
     *
     * A consistent standard contemporary British English IPA transcription
     * of the collocation as a phrase. Reflect word stress and natural connected
     * speech according to the project's pronunciation convention. Do not
     * simply concatenate isolated dictionary pronunciations if this misrepresents
     * how the phrase is normally spoken.
     */
    'pronunciation' => '',

    /**
     * pattern
     * -------
     * Type: string
     * Required: yes
     *
     * A concise description of the collocation's grammatical pattern, such as
     * "verb + noun", "adjective + noun", "noun + noun", or "adverb + adjective".
     * Use one consistent naming convention. This field describes the structure,
     * not the meaning or a full example sentence.
     */
    'pattern' => '',

    /**
     * components
     * ----------
     * Type: array of strings
     * Required: yes
     *
     * The lexical components that form the collocation, recorded as individual
     * strings. Use canonical word forms where practical. This is a descriptive
     * breakdown, not a list of synonyms or related expressions.
     */
    'components' => [],

    /**
     * meanings
     * --------
     * Type: list of meaning records.
     * Required: yes
     *
     * Include a separate record for each materially different meaning or use
     * of the collocation. If the combination has one clear sense, one record
     * is sufficient. Do not split minor paraphrases into artificial senses.
     */
    'meanings' => [
        [
            /**
             * definition
             * ----------
             * Type: string
             * Required: yes
             *
             * A concise explanation of what the combination means as a whole
             * in this use. Do not merely define each component separately.
             * Explain any conventional meaning or restriction that cannot be
             * reliably inferred from the individual words.
             */
            'definition' => '',

            /**
             * general_examples
             * ----------------
             * Type: array of strings
             * Required: yes
             *
             * Natural examples demonstrating the collocation in ordinary
             * contexts. Each item must be one complete example as a single
             * string. Keep the combination in its natural form and use enough
             * context to make the meaning clear.
             */
            'general_examples' => [
                // Each example is one complete string.
            ],

            /**
             * professional_examples
             * ----------------------
             * Type: array of strings
             * Required: yes
             *
             * Natural examples in programming, IT, software development, or
             * computer science. Each item must be one complete example as a
             * single string. Use technically credible contexts and retain the
             * collocation's normal meaning and grammatical pattern.
             *
             * Leave the array empty if no professional example would be natural;
             * do not force a technical context.
             */
            'professional_examples' => [
                // Programming, IT, software development, or computer science.
            ],

            /**
             * collocations
             * ------------
             * Type: array of strings
             * Required: yes
             *
             * Other established combinations that commonly accompany or extend
             * this collocation. Use this only where the relationship is useful
             * and genuine; do not repeat the current ID or list arbitrary
             * combinations simply because they are possible.
             */
            'collocations' => [],

            /**
             * synonyms
             * ---------
             * Type: array of strings
             * Required: yes
             *
             * Alternative collocations or expressions that convey a sufficiently
             * similar meaning. Prefer combinations with comparable grammar and
             * register where possible. Do not imply full interchangeability
             * when meaning, strength, or context differs.
             */
            'synonyms' => [],

            /**
             * antonyms
             * --------
             * Type: array of strings
             * Required: yes
             *
             * Opposing collocations, if a meaningful and useful contrast exists.
             * Many collocations have no natural antonym; use an empty array
             * rather than inventing a weak or misleading opposite.
             */
            'antonyms' => [],

            /**
             * educational_notes
             * -----------------
             * Type: array of strings
             * Required: yes
             *
             * Learner-facing notes about this particular use, such as why one
             * word combines naturally with another, register, restrictions,
             * common learner errors, or a contrast with a similar combination.
             * Keep each note concise and self-contained.
             */
            'educational_notes' => [],
        ],
    ],

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes applying to the collocation as a whole, such as general grammatical
     * behaviour or a recurring usage restriction. Put meaning-specific guidance
     * in meanings[*].educational_notes.
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
