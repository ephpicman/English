<?php

/**
 * Reading schema
 *
 * Purpose
 * This schema defines one reading-text record. Store the complete passage as an ordered list of paragraphs and keep its text type, source information, and educational metadata accurate.
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
     * A stable identifier for the reading text, not a sentence copied from its body.
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
     * "reading", matching this schema's entry type.
     */
    'type' => 'reading',

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
     * The title of the reading text as presented to the learner.
     */
    'title' => '',

    /**
     * content
     * -------
     * Type: array of strings
     * Required: yes
     *
     * The complete learner-facing reading passage, stored as an ordered array
     * of paragraph strings. Each item must contain exactly one paragraph:
     * do not combine separate paragraphs into one item or split a paragraph
     * across multiple items. Preserve the wording and sentence order of the
     * passage, and use separate items for genuine paragraph breaks rather than
     * empty strings. Include headings or subheadings only when they form part
     * of the text as presented to the learner. Do not include external task
     * instructions, comprehension questions, exercises, or editorial notes.
     */
    'content' => [],

    /**
     * text_type
     * ---------
     * Type: string
     * Required: yes
     *
     * The main genre or form of the reading passage, such as an article,
     * report, narrative, biography, interview, review, or informational text.
     * Choose one concise label that best describes the passage as a whole,
     * rather than its topic, subject area, or intended CEFR level. These
     * examples are illustrative, not a closed list; use a clear, conventional
     * label when none of them fits. Do not combine several labels to describe
     * a text that has one dominant form.
     */
    'text_type' => '',

    /**
     * source
     * ------
     * Type: string|null
     * Required: yes
     *
     * The identifiable source or attribution of the passage, such as its
     * author, publication, organisation, or a reliable source URL, where known
     * and relevant. Record enough information to identify or verify the source;
     * do not infer authorship or publication from resemblance to another text.
     * Use null when the passage is original to the project, genuinely
     * unattributed, or has no reliable identifiable source. Never invent
     * attribution. If a source text has been adapted, identify the original
     * source and make the adaptation clear where appropriate.
     */
    'source' => null,

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * A list of concise, learner-facing notes that materially help learners
     * understand or study the passage. Include relevant background or cultural
     * context, assumptions that may be unfamiliar, the purpose or conventions
     * of the genre, or notable language features and usage choices. Include
     * only information relevant to this particular text; do not repeat the
     * passage, its title, or general facts that learners do not need. Keep
     * these notes distinct from the passage itself and from internal editorial
     * comments. Do not store comprehension questions, exercises, answers, or
     * task instructions here. Leave the array empty when no notes are needed.
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
