<?php

/**
 * Conversation schema
 *
 * Documents the fixed structure of one conversation record. This file is a
 * schema/template, not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - Keep the content accurate, natural, and appropriate to its intended genre
 *   and CEFR level.
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
     * stable throughout the dialogue.
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
     * The dialogue in speaking order. Each turn contains the fixed keys 'speaker'
     * and 'text'; 'speaker' must match a participant identifier, and 'text' contains
     * that turn's utterance. Store one turn per item and do not mix editorial notes
     * into spoken lines.
     */
    'content' => [
        [
            'speaker' => 'A',
            'text' => '',
        ],
        [
            'speaker' => 'B',
            'text' => '',
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
