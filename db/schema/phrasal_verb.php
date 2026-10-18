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
     * Classifies the phrasal verb's object-taking behaviour across the senses
     * covered by this entry. Use exactly one value: "transitive" if the entry's
     * established uses require a direct object; "intransitive" if its established
     * uses do not take a direct object; or "both" if at least one established
     * sense is transitive and another is intransitive. Do not treat a complement
     * introduced by a preposition as a direct object. If behaviour differs by
     * sense, choose "both" and specify the pattern for each sense in its
     * educational_notes and, where useful, grammar_patterns. Do not infer
     * transitivity from the verb alone; assess the complete phrasal verb.
     */
    'transitivity' => '',

    /**
     * separability
     * ------------
     * Type: string
     * Required: yes
     *
     * Classifies whether a direct object can occur between the verb and its
     * particle. Use exactly one value: "separable" when the object can occur
     * between them in the relevant transitive use; "inseparable" when it must
     * follow the complete verb-particle sequence; "both" only when established
     * uses of the same entry genuinely permit both patterns; or "not_applicable"
     * when separation is not relevant, such as an exclusively intransitive use
     * or a construction whose complement is governed by a preposition rather
     * than a separable particle. Do not use "both" merely because different
     * senses have different patterns; explain sense-specific behaviour in the
     * relevant meanings. For separable transitive uses, state the placement rule
     * for noun phrases and pronouns in educational_notes (e.g. "turn the light
     * off" / "turn off the light", but "turn it off", not "turn off it").
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
             * Learner-facing notes that apply specifically to this meaning,
             * not automatically to every meaning in the entry. Explain details
             * needed to use this sense accurately that are not already clear
             * from its definition, examples, collocations, or grammar_patterns.
             * Include sense-specific transitivity and complement requirements;
             * whether an object is required, optional, or absent; permitted
             * object positions and pronoun placement; restrictions on the
             * construction; typical contexts; register or tone; common learner
             * errors; and useful distinctions from listed synonyms or antonyms.
             * Give a short usage rule or contrast when needed, but do not merely
             * repeat the definition, list extra examples, or restate a general
             * note that applies equally to the whole phrasal verb. Each item
             * must be concise, self-contained, and actionable.
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
     * Record the reusable sentence frames licensed by the complete phrasal
     * verb, not example sentences or prose explanations. Write each distinct
     * frame as a concise pattern and use explicit, consistent placeholders such
     * as "someone", "something", "someone to do something", or "something to
     * someone" to show the grammatical roles and required complements. Include
     * the particle in its canonical position and show alternative object
     * positions as separate patterns when both are grammatical (e.g. "turn
     * something off" and "turn off something"; record pronoun placement rules
     * in educational_notes). Include a pattern only when supported by
     * established usage for a meaning in this entry. If patterns differ by
     * meaning, include each materially different frame and identify its sense
     * only when needed to avoid ambiguity. Put explanations, restrictions,
     * exceptions, register, and common errors in the relevant educational_notes,
     * not in the pattern itself.
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
     * Learner-facing notes that apply across the entry's meanings, rather than
     * to only one sense. Use this field for grammatical or usage guidance that
     * remains true across the entry, recurring restrictions or learner errors,
     * general register or regional information, and distinctions that are
     * relevant to the phrasal verb as a whole. Keep each item concise,
     * self-contained, and useful for choosing or using the expression accurately.
     * Do not repeat definitions, examples, collocations, or grammar_patterns.
     * Put any rule that applies only to a particular meaning—including its
     * transitivity, complement requirements, object placement, or sense-specific
     * restrictions—in that meaning's educational_notes. Use grammar_patterns
     * for reusable sentence frames; use educational_notes to explain how,
     * when, and with what limitations those frames are used.
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
