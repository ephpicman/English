<?php

/**
 * Phrasal-Verb schema
 *
 * Purpose
 * This schema defines one phrasal-verb record. Preserve the verb and particle sequence, document grammatical behaviour accurately, and keep information about distinct meanings specific to each sense.
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
     * The canonical base form of the phrasal verb, including its particle or particles. Preserve the particle sequence and do not use an inflected form.
     * Keep identifiers unique within the relevant content collection.
     */
    'ID' => '[base form of the phrasal verb]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the category of record. The value must be exactly
     * "phrasal_verb", matching this schema's entry type.
     */
    'type' => 'phrasal_verb',

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
     * The dominant register or usage label. Use exactly one of the following
     * values: "neutral", "formal", "informal", "very informal", "slang",
     * "vulgar", "offensive", "dated", "literary", "regional", or
     * "technical". Use null when no single label is established or a label
     * would be misleading. Meaning-specific differences belong in the relevant
     * meaning's educational_notes. Use one exact value as shown; do not invent
     * synonyms or combine labels.
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
