<?php

/**
 * Proverb-entry schema
 *
 * Documents the fixed structure of one proverb record. This file is a
 * schema/template, not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and its dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - A proverb is a conventional saying that expresses general wisdom,
 *   advice, an observation, or a commonly recognised principle.
 * - Distinguish established proverbs from idioms, quotations, slogans, and
 *   ordinary sentences; do not classify an expression as a proverb merely
 *   because it is figurative or memorable.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical wording used to identify this proverb. Preserve the
     * established wording and spelling. If recognised variants exist, choose
     * one standard form for the ID and record meaningful variants separately
     * in the variants field. Do not use an incidental paraphrase as the ID.
     */
    'ID' => '[canonical wording of the proverb]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the record category. For this schema, the value must be
     * exactly "proverb".
     */
    'type' => 'proverb',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level assigned to this proverb: A1, A2, B1, B2, C1,
     * or C2. Store one actual level, not a range. Consider vocabulary,
     * figurative meaning, cultural knowledge, and the difficulty of using
     * the proverb appropriately in context.
     */
    'language_level' => 'B1',

    /**
     * pronunciation
     * -------------
     * Type: string
     * Required: yes
     *
     * A broad, standard contemporary British English IPA transcription of the
     * proverb as a spoken phrase. Include primary stress where appropriate
     * and reflect natural connected speech according to the project's
     * pronunciation convention. Do not use an American transcription or
     * simply concatenate isolated word pronunciations if that misrepresents
     * normal spoken delivery.
     */
    'pronunciation' => '',

    /**
     * meanings
     * --------
     * Type: list of meaning records.
     * Required: yes
     *
     * Record the established meaning or meanings conveyed by the proverb.
     * Usually one record is sufficient. Use separate records only when the
     * proverb has materially distinct conventional interpretations; do not
     * split minor paraphrases into artificial senses.
     */
    'meanings' => [
        [
            /**
             * definition
             * ----------
             * Type: string
             * Required: yes
             *
             * A concise explanation of the principle, advice, or observation
             * expressed by the proverb. Explain what it means in use rather
             * than merely rewording its imagery. Avoid circular definitions.
             */
            'definition' => '',

            /**
             * general_examples
             * ----------------
             * Type: array of strings
             * Required: yes
             *
             * Natural, complete example sentences showing how the proverb is
             * used in context. Each item must be one complete example as a
             * single string. Make the situation and the relevance of the
             * proverb clear; avoid examples that sound forced or preachy.
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
             * computer science, where the proverb genuinely fits the context.
             * Each item must be one complete example as a single string.
             *
             * Do not force a proverb into a technical situation if it would
             * sound unnatural or obscure. An empty array is acceptable when
             * no suitable professional example is available.
             */
            'professional_examples' => [
                // Programming, IT, software development, or computer science.
            ],

            /**
             * synonyms
             * ---------
             * Type: array of strings
             * Required: yes
             *
             * Other proverbs or established sayings that express substantially
             * the same principle. Prefer expressions that are genuinely
             * comparable in meaning; do not list merely related sayings or
             * ordinary words as proverb synonyms.
             */
            'synonyms' => [],

            /**
             * antonyms
             * --------
             * Type: array of strings
             * Required: yes
             *
             * Established proverbs or sayings that express a clearly opposing
             * principle, where such an opposition genuinely exists. An empty
             * array is preferable to a misleading or artificially constructed
             * antonym.
             */
            'antonyms' => [],

            /**
             * educational_notes
             * -----------------
             * Type: array of strings
             * Required: yes
             *
             * Learner-focused notes specific to this meaning, such as
             * figurative interpretation, appropriate situations, tone,
             * register, cultural context, or common misuse. Keep each note
             * self-contained and avoid repeating the definition.
             */
            'educational_notes' => [],
        ],
    ],

    /**
     * variants
     * --------
     * Type: array of strings
     * Required: yes
     *
     * Recognised wording variants of the same proverb, including established
     * British forms where relevant. Include only attested variants that
     * preserve the proverb's identity and meaning. Do not use this field for
     * paraphrases, translations, or different proverbs with similar meanings.
     * Keep the ID as the single canonical form chosen for this record.
     */
    'variants' => [],

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * The usual register or tone of the proverb, such as neutral, informal,
     * traditional, humorous, or formal. Use a consistent descriptive
     * convention. If register varies significantly by context, explain that
     * in educational_notes rather than listing unrelated labels.
     */
    'register' => '',

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes that apply to the proverb as a whole rather than to one meaning.
     * Use this for general cultural or historical context, overall usage
     * cautions, or a broad distinction from similar types of expression.
     * Put meaning-specific guidance in meanings[*].educational_notes.
     */
    'educational_notes' => [],

    /*
    |--------------------------------------------------------------------------
    | Exclusively maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | Metadata organises this record and its manually curated relationships.
    | Automated processing must not silently overwrite editorial choices.
    */

    /**
     * meta
     * ----
     * Type: associative array.
     * Required: yes
     *
     * Human-maintained metadata used to organise and connect entries.
     */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal notes for the human editor, such as wording verification,
         * source checks, or consistency decisions. These are not learner-facing
         * explanations.
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
         * Type: associative array with the fixed relationship categories below.
         * Each value is an array of strings containing canonical identifiers.
         *
         * Record only meaningful relationships that have been checked by an
         * editor. Do not add categories or use this field for incidental
         * mentions. The existing shared keys are retained unchanged.
         */
        'related' => [
            /**
             * words
             * -----
             * Related single-word entries that help explain the proverb's
             * vocabulary or an important contrast.
             */
            'words' => [],

            /**
             * grammars
             * --------
             * Grammar topics that explain a notable structure used in the
             * proverb or help learners use it appropriately.
             */
            'grammars' => [],

            /**
             * idioms
             * ------
             * Related idiom entries with a meaningful semantic or usage link.
             * Do not classify the proverb itself as an idiom merely to link it.
             */
            'idioms' => [],

            /**
             * phrasal_verbs
             * -------------
             * Related phrasal-verb entries that help explain important wording
             * or a useful contrast.
             */
            'phrasal_verbs' => [],

            /**
             * collocations
             * ------------
             * Related collocation entries that are genuinely useful for
             * understanding or using the proverb.
             */
            'collocations' => [],

            /**
             * questions
             * ---------
             * Related question records, if the repository maintains such
             * records. This is a cross-reference category only, not a field
             * for creating or storing exercises or questions in this entry.
             */
            'questions' => [],
        ],
    ],
];
