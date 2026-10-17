<?php

/**
 * Monologue schema
 *
 * Documents the fixed structure of one monologue record. This file is a
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
     * The canonical identifier for this record. Use a stable descriptive identifier for the monologue.
     * Keep identifiers unique within the relevant content collection and do
     * not use an incidental sentence from the body as the identifier.
     */
    'ID' => '[canonical identifier]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the record category. For this schema, the value must be
     * exactly "monologue".
     */
    'type' => 'monologue',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level targeted by this record: A1, A2, B1, B2, C1, or C2.
     * Store one level, not a range. Assign it based on the language and
     * comprehension demands of the complete record.
     */
    'language_level' => 'B1',

    /**
     * title
     * -----
     * Type: string
     * Required: yes
     *
     * A concise title that identifies the monologue's topic or communicative situation.
     */
    'title' => '',

    /**
     * content
     * -------
     * Type: string
     * Required: yes
     *
     * The complete spoken text, written to sound natural when delivered aloud. Keep paragraph or pause-related line breaks where they support delivery; do not append practice questions.
     */
    'content' => '',

    /**
     * purpose
     * -------
     * Type: string
     * Required: yes
     *
     * The main communicative purpose, such as describing an experience, presenting an opinion, or explaining a process.
     */
    'purpose' => '',

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * The dominant spoken register, such as informal, neutral, or formal. Reflect the language actually used in the monologue.
     */
    'register' => '',

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes on spoken organisation, signposting, natural phrasing, or relevant pronunciation and delivery features. Keep them separate from the monologue itself.
     */
    'educational_notes' => [],

    /*
    |--------------------------------------------------------------------------
    | Exclusively maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | Metadata organises the record and its manually curated relationships.
    | Keep editorial workflow notes separate from learner-facing content.
    */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal editorial notes for the human editor, such as source checks,
         * consistency decisions, or issues to revisit. Do not put learner-facing
         * explanations here.
         */
        'editorial_notes' => [],

        /**
         * tags
         * ----
         * Type: array of strings
         *
         * Concise, consistent labels for filtering and organisation. Avoid
         * near-duplicate tags that differ only in spelling or capitalisation.
         */
        'tags' => [],

        /**
         * related
         * -------
         * Type: associative array with the fixed relationship categories below.
         * Each value is an array of strings containing canonical identifiers.
         *
         * Record only meaningful relationships that have been checked by an
         * editor. Do not add categories or use this field for incidental mentions.
         */
        'related' => [
            'words' => [],
            'grammars' => [],
            'idioms' => [],
            'phrasal_verbs' => [],
            'collocations' => [],
            'questions' => [],
        ],
    ],
];
