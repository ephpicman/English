<?php

/**
 * Reading schema
 *
 * Documents the fixed structure of one reading text record. This file is a
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
     * The canonical identifier for this record. Use a stable identifier for the reading text, not a sentence copied from it.
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
     * exactly "reading".
     */
    'type' => 'reading',

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
     * The title of the reading text as presented to the learner.
     */
    'title' => '',

    /**
     * content
     * -------
     * Type: string
     * Required: yes
     *
     * The complete reading passage. Preserve paragraph breaks and meaningful textual formatting. Do not append comprehension questions or exercises.
     * TODO: must be an array of strings to separate paragraphes
     */
    'content' => '',

    /**
     * text_type
     * ---------
     * Type: string
     * Required: yes
     *
     * The main text genre, such as article, report, narrative, biography, or informational passage. Choose the most useful dominant category.
     */
    'text_type' => '',

    /**
     * source
     * ------
     * Type: string|null
     * Required: yes
     *
     * The publication, author, or source attribution when known and appropriate. Use null when the text is original, unattributed, or no reliable source is available; never invent attribution.
     */
    'source' => null,

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Brief learner-facing context about genre, background knowledge, or notable language features. Do not use this field to store comprehension questions.
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
        ],
    ],
];
