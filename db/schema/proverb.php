<?php

/**
 * Proverb schema
 *
 * Purpose
 * This schema defines one established proverb record. Preserve its conventional wording, distinguish genuine proverbs from idioms, quotations, slogans, and ordinary sentences, and record recognised variants separately where appropriate.
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
 * This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical wording of the proverb. Preserve its established wording; record meaningful variants in the variants field rather than using a variant as the identifier.
     * Keep identifiers unique within the relevant content collection.
     */
    'ID' => '[canonical wording of the proverb]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the category of record. The value must be exactly
     * "proverb", matching this schema's entry type.
     */
    'type' => 'proverb',

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
             * Established proverbs or conventional sayings that communicate
             * substantially the same lesson or principle as this meaning.
             * Include an expression only when the meanings are genuinely
             * comparable, not merely connected by topic. Do not list single
             * words, loose paraphrases, or expressions that are interchangeable
             * only in a narrow context. Keep each item as the recognised wording
             * of the other saying; explain important differences in scope or
             * usage in this meaning's educational_notes. An empty array is
             * preferable when no reliable equivalent is known.
             */
            'synonyms' => [],

            /**
             * antonyms
             * --------
             * Type: array of strings
             * Required: yes
             *
             * Established proverbs or conventional sayings that express a
             * substantially opposing lesson or principle to this meaning.
             * Include an item only when the contrast is meaningful and defensible;
             * do not treat a different viewpoint, a partial exception, or a merely
             * unrelated saying as an antonym. Do not invent a proverb or use a
             * single word to fill the field. Explain a useful qualification in
             * this meaning's educational_notes if the contrast is not exact.
             * An empty array is preferable when no genuine counterpart exists.
             */
            'antonyms' => [],

            /**
             * educational_notes
             * -----------------
             * Type: array of strings
             * Required: yes
             *
             * Learner-facing guidance that applies specifically to this
             * interpretation of the proverb. Explain the intended lesson and
             * figurative imagery when the definition alone is insufficient;
             * identify situations in which the saying is appropriate or
             * inappropriate, its implication or tone in context, and any
             * meaning-specific cultural assumptions or common misinterpretations.
             * Use these notes to clarify limits to the advice or principle where
             * relevant. Do not repeat the definition, add more example sentences,
             * or duplicate guidance that applies equally to every meaning; put
             * that shared guidance in the top-level educational_notes. Each item
             * must be concise, self-contained, and useful for interpreting or
             * using this meaning accurately.
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
     * Established, attested alternative wordings of the same proverb that
     * retain its identity and substantially the same meaning. Include genuine
     * lexical or grammatical variants, including recognised British forms
     * where relevant. Do not include mere paraphrases, translations, shortened
     * explanations, quotations from a different source, or separate proverbs
     * that express a similar lesson. Preserve each variant's conventional
     * wording and keep the ID as the single canonical form selected for this
     * record. Leave the array empty if no reliable variant is known.
     */
    'variants' => [],

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * Choose the single best label for the proverb's usual social or stylistic
     * character from this controlled list: "neutral", "formal", "informal",
     * "humorous", "ironic", "sarcastic", "traditional", "literary", "dated",
     * "regional", "religious", or "offensive". Use the value exactly as written.
     * Select the dominant characteristic, not every label that could apply in
     * some context. Here, "register" covers the expression's usual level of
     * formality, tone, or marked social/cultural character; it is not a rating
     * of how wise, polite, or true the proverb is. If the label depends strongly
     * on context, or the proverb has mixed characteristics, choose the most
     * representative value and explain the qualification in educational_notes.
     */
    'register' => '',

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Learner-facing notes that apply across the proverb's meanings and uses,
     * rather than to one interpretation only. Use this field for shared cultural
     * or historical background, the proverb's general conventional status or
     * origin where reliably known, broad usage cautions, and distinctions from
     * idioms, quotations, slogans, or similar sayings when these help learners.
     * Include only information relevant to understanding or using the proverb;
     * do not add unsupported origin stories, repeat the definition, or duplicate
     * sense-specific explanations. Put guidance that applies only to one
     * interpretation in meanings[*].educational_notes. Each item should be
     * concise, self-contained, and useful to the learner.
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
