<?php

/**
 * Idiom-entry schema
 *
 * Documents the structure of one idiom record. This is a schema/template,
 * not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and its dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - Keep every definition, example, synonym, and note relevant to the sense
 *   it describes.
 * - An idiom is a conventional expression whose meaning is not always
 *   predictable from the meanings of its individual words.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical form of the idiom, including the words normally required
     * to identify it (e.g. "spill the beans"). Use a consistent dictionary
     * form and spelling. Do not use an incidental inflected form from an
     * example as the identifier.
     */
    'ID' => '[canonical form of the idiom]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the record category. For this schema, the value must be
     * exactly "idiom".
     */
    'type' => 'idiom',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level assigned to this idiom: A1, A2, B1, B2, C1, or C2.
     * Store one actual level. This is the level for the entry as a whole;
     * individual meanings do not have separate level fields.
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
    | Exclusively maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | The meta section holds manually curated organisation and relationships.
    | Automated processing must not silently overwrite editorial choices.
    */

    /**
     * meta
     * ----
     * Type: associative array.
     * Required: yes
     *
     * Human-maintained metadata used to organise this entry and link it to
     * related records.
     */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal notes for the human editor, such as a source to verify,
         * a consistency issue, or an editorial decision to revisit. These
         * are not intended as learner-facing explanations.
         */
        'editorial_notes' => [],

        /**
         * tags
         * ----
         * Type: array of strings
         *
         * Human-assigned labels for filtering and organisation. Use concise,
         * consistent labels and avoid near-duplicates caused by spelling or
         * capitalisation differences.
         */
        'tags' => [],

        /**
         * related
         * -------
         * Type: associative array with fixed relationship categories.
         * Each value is an array of strings.
         *
         * Store canonical identifiers or names used by the relevant entry
         * collections. Relationships should be selected or confirmed by a
         * human editor; do not treat unreviewed automatic suggestions as
         * curated links. Avoid duplicates and do not add new categories here.
         */
        'related' => [
            /**
             * words
             * -----
             * Related single-word entries that help explain or contrast with
             * the idiom. Do not list every word contained in the expression.
             */
            'words' => [],

            /**
             * grammars
             * --------
             * Grammar topics that help explain the idiom's structure or use.
             */
            'grammars' => [],

            /**
             * idioms
             * ------
             * Other idiom entries with a meaningful semantic, usage, or
             * contrastive relationship to this idiom.
             */
            'idioms' => [],

            /**
             * phrasal_verbs
             * -------------
             * Related phrasal verbs that overlap in meaning or usage.
             */
            'phrasal_verbs' => [],

            /**
             * collocations
             * ------------
             * Related collocation entries maintained in the collocation
             * collection. These are cross-entry links, not a replacement
             * for meanings[*].collocations.
             */
            'collocations' => [],
        ],
    ],
];
