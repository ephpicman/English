<?php

/**
 * Letter schema
 *
 * Documents the fixed structure of one letter record. This file is a
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
     * The canonical identifier for this record. For a letter, use a stable descriptive identifier that distinguishes the item.
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
     * exactly "letter".
     */
    'type' => 'letter',

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
     * A concise title or subject line that identifies the letter's purpose. For correspondence where the subject line is not part of the genre, use a short descriptive title.
     */
    'title' => '',

    /**
     * content
     * -------
     * Type: string
     * Required: yes
     *
     * The complete letter, including salutation, body paragraphs, and sign-off where appropriate. Preserve paragraph breaks. Do not add exercise prompts or editorial commentary.
     */
    'content' => '',

    /**
     * letter_type
     * -----------
     * Type: string
     * Required: yes
     *
     * The broad kind of letter, such as formal, semi-formal, or informal. Use a consistent vocabulary of values across the collection.
     */
    'letter_type' => '',

    /**
     * purpose
     * -------
     * Type: string
     * Required: yes
     *
     * The main communicative purpose, such as making a complaint, applying for a position, or thanking someone. Describe the purpose, not the full content.
     */
    'purpose' => '',

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * The language register used throughout the letter, such as formal, neutral, or informal. Choose the dominant register and note meaningful shifts in educational_notes.
     */
    'register' => '',

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Learner-facing notes about letter conventions, tone, organisation, or useful language choices. Keep notes separate from the letter itself.
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
