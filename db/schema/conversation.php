<?php

/**
 * Conversation schema
 *
 * Purpose
 * This schema defines one conversation record. Keep participant identifiers stable, ensure each dialogue turn refers to a defined participant, and preserve the order in which the turns are spoken.
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
     * A stable, descriptive identifier for the conversation.
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
     * "conversation", matching this schema's entry type.
     */
    'type' => 'conversation',

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
     * A concise title that identifies the situation or topic of the conversation.
     */
    'title' => '',

    /**
     * participants
     * ------------
     * Type: array
     * Required: yes
     *
     * An ordered list of participant records. Keep each participant's identifier
     * stable throughout the dialogue. Each record contains:
     * - speaker: the unique short identifier used to attribute dialogue turns.
     * - role: the participant's role or relationship in the situation, such as
     *   customer, colleague, interviewer, or friend.
     */
    'participants' => [
        [
            'speaker' => 'A',
            'role' => '',
        ],
        [
            'speaker' => 'B',
            'role' => '',
        ],
        /* 
         * Add more speakers if needed.
         */
    ],

    /**
     * content
     * -------
     * Type: array of associative arrays
     * Required: yes
     *
     * The dialogue in speaking order. Each turn contains the fixed keys 'speaker',
     * 'text', and 'ipa'. 'speaker' must match a participant identifier; 'text'
     * contains the turn's utterance; and 'ipa' is an ordered array of British
     * English IPA transcriptions, with one item for each sentence in 'text' and
     * in the same order. Use accurate contemporary standard British pronunciation,
     * including stress and natural connected speech where appropriate. Store one
     * turn per item and do not mix editorial notes into spoken lines.
     */
    'content' => [
        [
            'speaker' => 'A',
            'text' => '',
            'ipa' => [],
        ],
        [
            'speaker' => 'B',
            'text' => '',
            'ipa' => [],
        ],
    ],

    /**
     * situation
     * ---------
     * Type: string
     * Required: yes
     *
     * The setting or context that makes the exchange understandable, described briefly
     * without scripting additional turns.
     */
    'situation' => '',

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * The dominant register of the conversation, such as informal, neutral, or formal.
     * If the participants use different registers, describe the contrast in educational_notes.
     */
    'register' => '',

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes on turn-taking, natural responses, pragmatic meaning, or spoken-language features.
     * Do not store exercises or questions here.
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
