<?php

/**
 * Phrasal-verb entry schema
 *
 * Documents the structure of one phrasal-verb record. This is a schema/template,
 * not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - A phrasal verb consists of a verb and one or more particles; some phrasal
 *   verbs are separable, while others are not.
 * - Keep grammatical behaviour and meaning-specific information accurate for
 *   each sense.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical base form of the phrasal verb, including its particle(s)
     * (e.g. "carry out" or "look forward to"). Use the verb's base form and
     * preserve the particle sequence. Do not use an inflected form such as
     * "carried out" as the identifier.
     */
    'ID' => '[base form of the phrasal verb]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the record category. For this schema, the value must be
     * exactly "phrasal_verb".
     */
    'type' => 'phrasal_verb',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level assigned to the phrasal verb: A1, A2, B1, B2,
     * C1, or C2. Store one actual level. Individual meanings do not have
     * separate level fields in this schema.
     */
    'language_level' => 'B1',

    /**
     * pronunciation
     * -------------
     * Type: string
     * Required: yes
     *
     * A consistent standard contemporary British English IPA transcription
     * of the phrasal verb. Include primary stress where appropriate and follow
     * the project's convention for connected speech and particle stress.
     * Do not mix British and American pronunciations.
     */
    'pronunciation' => '',

    /**
     * word_forms
     * ----------
     * Type: associative array with the fixed keys below.
     * Values: string|null
     * Required: yes
     *
     * Record the verb forms of the complete phrasal verb. The particle remains
     * part of the expression while the verb changes form (e.g. "carry out",
     * "carries out", "carried out", "carrying out").
     *
     * Use null for slots that are not applicable or not recorded. Keep every
     * key even when a form is irregular or a slot is not applicable. Do not
     * put a particle variant or a different phrasal verb in these fields.
     */
    'word_forms' => [
        /**
         * plural
         * ------
         * Retained to match the shared word_forms structure used by word.php.
         * It does not apply to a phrasal verb and must remain null.
         */
        'plural' => null,

        /**
         * third_person_singular
         * ---------------------
         * The present simple third-person singular form of the complete
         * phrasal verb (e.g. "carries out").
         */
        'third_person_singular' => null,

        /**
         * past_simple
         * -----------
         * The past simple form (e.g. "carried out").
         */
        'past_simple' => null,

        /**
         * past_participle
         * ---------------
         * The past participle form (e.g. "carried out").
         */
        'past_participle' => null,

        /**
         * present_participle
         * ------------------
         * The -ing form (e.g. "carrying out").
         */
        'present_participle' => null,

        /**
         * comparative
         * -----------
         * Retained to match the shared word_forms structure used by word.php.
         * It does not apply to a phrasal verb and must remain null.
         */
        'comparative' => null,

        /**
         * superlative
         * -----------
         * Retained to match the shared word_forms structure used by word.php.
         * It does not apply to a phrasal verb and must remain null.
         */
        'superlative' => null,
    ],

    /**
     * verb
     * ----
     * Type: string
     * Required: yes
     *
     * The base verb component of the phrasal verb (e.g. "carry" in "carry out").
     * Record only the verb, not the particle or the complete expression.
     */
    'verb' => '',

    /**
     * particles
     * ---------
     * Type: array of strings
     * Required: yes
     *
     * The particle or particles in their canonical order (e.g. ["out"] or
     * ["forward", "to"] where the project's classification treats the complete
     * expression as a phrasal-verb entry). Use a consistent linguistic
     * convention for distinguishing particles from prepositions.
     */
    'particles' => [],

    /**
     * transitivity
     * ------------
     * Type: string
     * Required: yes
     *
     * Describes whether the phrasal verb takes an object. Use a consistent
     * controlled value such as "transitive", "intransitive", or "both".
     * Use "both" only when the same entry genuinely has transitive and
     * intransitive uses; document sense-specific behaviour in the meanings.
     */
    'transitivity' => '',

    /**
     * separability
     * ------------
     * Type: string
     * Required: yes
     *
     * Describes whether the verb and particle can be separated by an object.
     * Use a consistent controlled value such as "separable", "inseparable",
     * "both", or "not_applicable". For separable transitive phrasal verbs,
     * explain relevant pronoun placement (e.g. "turn it off", not normally
     * "turn off it") in educational_notes. Distinguish true particles from
     * prepositions when determining this value.
     */
    'separability' => '',

    /**
     * meanings
     * --------
     * Type: list of meaning records.
     * Required: yes
     *
     * Record each materially different sense separately. Different senses may
     * have different transitivity, separability, register, or grammatical
     * patterns; document those differences at the meaning level in notes.
     */
    'meanings' => [
        [
            /**
             * definition
             * ----------
             * Type: string
             * Required: yes
             *
             * A concise explanation of this sense of the complete phrasal verb.
             * Do not define only the main verb or only the particle. Avoid
             * circular definitions and distinguish senses that are close in
             * meaning but behave differently.
             */
            'definition' => '',

            /**
             * general_examples
             * ----------------
             * Type: array of strings
             * Required: yes
             *
             * Natural examples demonstrating this sense. Each item must be
             * one complete example as a single string. Show the phrasal verb
             * in a grammatical form appropriate to the context; where useful,
             * demonstrate object placement or separability accurately.
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
             * Natural examples from programming, IT, software development, or
             * computer science. Each item must be one complete example as a
             * single string. Use the phrasal verb in the same sense as the
             * definition and in a technically credible context.
             *
             * An empty array is acceptable when no professional example fits
             * naturally; do not force the expression into technical prose.
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
             * Common words or phrases that naturally occur with this sense,
             * including typical objects or complements (e.g. "carry out a test").
             * Do not use this list as a substitute for grammar_patterns or
             * complete example sentences.
             */
            'collocations' => [],

            /**
             * synonyms
             * ---------
             * Type: array of strings
             * Required: yes
             *
             * Words or expressions with a sufficiently similar meaning in this
             * sense. Include alternatives only when they are useful and accurate.
             * Note differences in register, nuance, or grammatical pattern in
             * educational_notes rather than implying full interchangeability.
             */
            'synonyms' => [],

            /**
             * antonyms
             * --------
             * Type: array of strings
             * Required: yes
             *
             * Expressions with an opposing meaning, where a meaningful contrast
             * exists. Many phrasal-verb senses have no direct antonym; leave
             * the array empty rather than adding an inaccurate opposite.
             */
            'antonyms' => [],

            /**
             * educational_notes
             * -----------------
             * Type: array of strings
             * Required: yes
             *
             * Learner-facing notes specific to this sense. Use these for
             * transitivity, object placement, separability, pronoun position,
             * register, common errors, or differences from similar expressions.
             * Each item should be concise and self-contained.
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
     * Common grammatical frames for the phrasal verb, such as "phrasal verb +
     * object" or "phrasal verb + prepositional complement". Use clear,
     * consistent patterns and placeholders where they help. Include only
     * patterns supported by established usage.
     */
    'grammar_patterns' => [],

    /**
     * register
     * --------
     * Type: string|null
     * Required: yes
     *
     * The usual register or style, such as "informal", "formal", "neutral",
     * or a more precise label. Use null when a single label is not established
     * or would be misleading. Meaning-specific differences belong in the
     * relevant meaning's educational_notes.
     * TODO: use an enumeration list if possible
     */
    'register' => null,

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes that apply to the phrasal verb as a whole, such as general
     * grammatical behaviour or a recurring usage caution. Put notes that
     * apply only to one sense in meanings[*].educational_notes.
     */
    'educational_notes' => [],

    /*
    |--------------------------------------------------------------------------
    | Exclusively maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | The meta section contains manually curated organisation and relationships.
    | Automated processing must not silently overwrite editorial choices.
    */

    /**
     * meta
     * ----
     * Type: associative array.
     * Required: yes
     *
     * Human-maintained metadata used to organise this entry and connect it to
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
         * are not learner-facing explanations.
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
             * Related single-word entries, especially the base verb or words
             * that help explain or contrast with this phrasal verb.
             */
            'words' => [],

            /**
             * grammars
             * --------
             * Grammar topics relevant to the phrasal verb's structure or use.
             */
            'grammars' => [],

            /**
             * idioms
             * ------
             * Idioms with a meaningful semantic or usage relationship to
             * this phrasal verb.
             */
            'idioms' => [],

            /**
             * phrasal_verbs
             * -------------
             * Other phrasal verbs with related meanings, patterns, or useful
             * contrasts.
             */
            'phrasal_verbs' => [],

            /**
             * collocations
             * ------------
             * Related collocation records. These are cross-entry links, not a
             * replacement for meanings[*].collocations.
             */
            'collocations' => [],
        ],
    ],
];
