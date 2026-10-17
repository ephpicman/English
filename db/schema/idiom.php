<?php

/**
 * Idiom schema
 *
 * This schema defines one idiom record, including its pronunciation and sense-specific information. Treat each conventional meaning separately where necessary, and use natural standard contemporary British English pronunciation.
 *
 * Schema purpose and conventions
 * - This file defines the required structure and field-level guidance for one
 *   record of its specific content type; it is a schema/template, not a completed entry.
 * - Treat the keys, nesting, and data types defined below as authoritative.
 *   Do not add, remove, rename, or repurpose fields in individual records
 *   without deliberately revising the schema and dependent tooling.
 * - Use UTF-8 text, British English, and accurate, natural language suitable
 *   for the record's purpose, intended audience, and stated CEFR level.
 * - Use strings for single text values and arrays of strings for ordered lists
 *   of text, as specified by each field. Preserve the order of paragraphs,
 *   examples, dialogue turns, or other sequences where order matters.
 * - Follow each field's documented requirements and controlled values. Keep
 *   editorial metadata separate from learner-facing content.
 * - Replace illustrative placeholders with actual record data in completed
 *   entries. Do not treat this schema's sample values as finished content.
 *
This schema defines one idiom record, including its pronunciation and sense-specific information.
 * Treat each conventional meaning separately where necessary, and use natural standard contemporary British English pronunciation.
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
     * The canonical form of the idiom, including the words normally required to identify it.
     * Keep identifiers unique within the relevant content collection.
     */
    'ID' => '[canonical form of the idiom]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the category of record. The value must be exactly
     * "idiom", matching this schema's entry type.
     */
    'type' => 'idiom',

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
     * Transcribe the complete idiom as it is naturally spoken in standard
     * contemporary British English IPA. Include primary stress where relevant,
     * and represent weak forms, connected speech, and sound changes according
     * to the project's pronunciation convention. Do not create the transcription
     * by simply joining the citation-form IPA of the individual words; use the
     * natural pronunciation of the expression as a whole. Do not use an
     * American transcription.
     */
    'pronunciation' => '',

    /**
     * meanings
     * --------
     * Type: list of meaning records.
     * Required: yes
     *
     * Separate genuinely different conventional meanings into distinct
     * records. Keep the idiom's intended figurative or conventional sense
     * distinct from any literal interpretation unless the literal use is
     * itself an established, useful sense of the expression.
     */
    'meanings' => [
        [
            /**
             * definition
             * ----------
             * Type: string
             * Required: yes
             *
             * A concise explanation of the idiom's conventional meaning.
             * Define what the expression communicates in context rather than
             * merely paraphrasing its individual words. Avoid circular
             * definitions and distinguish similar idioms where useful.
             */
            'definition' => '',

            /**
             * general_examples
             * ----------------
             * Type: array of strings
             * Required: yes
             *
             * Natural examples that clearly demonstrate this idiom in use.
             * Each item must be one complete example as a single string.
             * Preserve the idiom's normal wording and grammatical behaviour.
             * Context should make the intended sense clear; avoid examples
             * that accidentally suggest a different meaning.
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
             * Examples set in programming, IT, software development, or
             * computer science, where the idiom fits naturally. Each item
             * must be one complete example as a single string.
             *
             * Do not force an idiom into a technical context if it would sound
             * unnatural or obscure. An empty array is acceptable when no
             * suitable professional example is available.
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
             * Common words or phrases that naturally occur with this idiom,
             * including established extensions or common surrounding patterns.
             * Keep these distinct from complete example sentences and avoid
             * listing arbitrary combinations that are not conventional.
             */
            'collocations' => [],

            /**
             * synonyms
             * ---------
             * Type: array of strings
             * Required: yes
             *
             * Idioms or other expressions with a sufficiently similar meaning
             * to be useful comparisons. Do not imply that a synonym is
             * interchangeable in every context. Explain important differences
             * in register, tone, or meaning in educational_notes.
             */
            'synonyms' => [],

            /**
             * antonyms
             * --------
             * Type: array of strings
             * Required: yes
             *
             * Expressions with a genuinely opposing meaning, where such an
             * opposition exists and is useful to learners. Many idioms have
             * no natural antonym; in those cases, leave this array empty.
             */
            'antonyms' => [],

            /**
             * educational_notes
             * -----------------
             * Type: array of strings
             * Required: yes
             *
             * Learner-facing guidance specific to this meaning, such as
             * register, tone, cultural context, pragmatic effect, restrictions,
             * common mistakes, or a warning against literal interpretation.
             * Each item should be a concise, self-contained string.
             */
            'educational_notes' => [],
        ],
    ],

    /**
     * grammar_patterns
     * ----------------
     * Type: array of strings
     * Required: yes
     *
     * Each item must be one concise, complete grammatical frame, written using
     * a consistent convention. Use explicit placeholders such as "someone",
     * "something", or "about something" where the variable parts matter; for
     * example, "someone spills the beans (about something)". Do not put a bare
     * fragment whose grammatical role is unclear, and do not use this field as
     * a duplicate of example sentences. Explain exceptions or sense-specific
     * differences in educational_notes.
     */
    'grammar_patterns' => [],

    /**
     * register
     * --------
     * Type: string|null
     * Required: yes
     *
     * The idiom's usual register or style, such as "informal", "formal",
     * "neutral", or a more precise description. Use null when its register
     * is not established or a single label would be misleading. Apply a
     * consistent vocabulary across the collection.
     */
    'register' => null,

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes applying to the idiom as a whole rather than to one meaning.
     * Use this for overall usage, grammatical behaviour, regional status,
     * or general learning cautions. Put sense-specific notes in
     * meanings[*].educational_notes.
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
